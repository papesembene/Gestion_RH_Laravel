<form method="POST" action="{{ route('profile.update', ['token' => $token]) }}">
    @csrf
    @method('PUT')

    <!-- Champ de saisie pour le nom -->
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Champ de saisie pour l'email -->
    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse email') }}</label>
        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Champ de saisie pour le mot de passe -->
    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>
        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Champ de saisie pour la confirmation du mot de passe -->
    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer le mot de passe') }}</label>
        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
        </div>
    </div>

    <!-- Bouton de soumission -->
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Enregistrer les modifications') }}
            </button>
        </div>
    </div>
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <a href="{{ route('home') }}" class="btn btn-secondary">
                {{ __('Annuler') }}
            </a>
        </div>
    </div>
</form>
