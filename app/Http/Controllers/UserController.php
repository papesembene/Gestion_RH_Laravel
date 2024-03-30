<?php

namespace App\Http\Controllers;
use App\Mail\NewUserWelcomeMail;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Notifications\SendEmailToNewUser;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
class UserController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-user|edit-user|delete-user', ['only' => ['index','show']]);
        $this->middleware('permission:create-user', ['only' => ['create','store']]);
        $this->middleware('permission:edit-user', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-user', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('users.index', [
            'users' => User::latest('id')->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('users.create', [
            'roles' => Role::pluck('name')->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @throws Exception
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        $input = $request->all();
        $input['employee_id'] = $request['employee_id'];
        $input['email'] = $request['email'];
        $input['password'] = Hash::make($request->password);
        $user = User::create($input);
        $user->assignRole($request->roles);
        // Envoyer un e-mail de bienvenue au nouvel utilisateur
        Mail::to($user->email)->send(new NewUserWelcomeMail($user));
        return redirect()->route('users.index')
            ->withSuccess('New user is added successfully.');

    }





    /**
     * Display the specified resource.
     */
    public function show(User $user): View
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        // Check Only Super Admin can update his own Profile
        if ($user->hasRole('Super Admin')){
            if($user->id != auth()->user()->id){
                abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS');
            }
        }

        return view('users.edit', [
            'user' => $user,
            'roles' => Role::pluck('name')->all(),
            'userRoles' => $user->roles->pluck('name')->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $input = $request->all();

        if(!empty($request->password)){
            $input['password'] = Hash::make($request->password);
        }else{
            $input = $request->except('password');
        }

        $user->update($input);

        $user->syncRoles($request->roles);

        return redirect()->back()
            ->withSuccess('User is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        // About if user is Super Admin or User ID belongs to Auth User
        if ($user->hasRole('Super Admin') || $user->id == auth()->user()->id)
        {
            abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS');
        }

        $user->syncRoles([]);
        $user->delete();
        return redirect()->route('users.index')
            ->withSuccess('User is deleted successfully.');
    }

    /**
     * Affiche le formulaire d'édition du profil de l'utilisateur connecté.
     */
    public function editProfile($token)
    {
        // Décodez le token pour obtenir l'identifiant de l'utilisateur
        $userId = Crypt::decrypt($token);

        // Récupérez les informations de l'utilisateur
        $user = User::findOrFail($userId);

        // Passer le token à la vue
        return view('users.edit_profile', compact('user', 'token'));
    }
    public function updateProfile(Request $request, $token)
    {
        // Décodez le token pour obtenir l'identifiant de l'utilisateur
        $userId = Crypt::decrypt($token);

        // Récupérez l'utilisateur à partir de l'identifiant
        $user = User::findOrFail($userId);

        // Validez les données soumises par le formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            // Ajoutez ici des règles de validation pour d'autres champs si nécessaire
        ]);

        // Mettez à jour les informations du profil de l'utilisateur avec les nouvelles données soumises
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            // Ajoutez ici d'autres champs à mettre à jour si nécessaire
        ]);
        //Connexion automatique de l'utilisateur après la mise à jour du profil
       Auth::loginUsingId($user->id);
       // Redirection de l'utilisateur vers une certaine page après la mise à jour du profil
      return redirect()->route('home')->withSuccess('Votre profil a été mis à jour avec succès.');

        // Redirigez l'utilisateur vers la page d'édition du profil avec un message de succès
        //return redirect()->route('users.edit_profile', ['token' => $token])
           // ->with('success', 'Votre profil a été mis à jour avec succès.');
    }

    public function getEmployeeDetails($id)
    {
        //récupérer les détails employee en fonction de l'ID

        $employee = Employee::find($id);
        if (!$employee) {
            return response()->json(['error' => 'employee not found'], 404);
        }

        return response()->json([
            'nom' => $employee->nom,
            'prenom' => $employee->prenom,
            'email' => $employee->email,

        ]);
    }

}
