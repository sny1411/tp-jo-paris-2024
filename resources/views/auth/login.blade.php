<x-guest-layout>
    <div class="wrap">
        <form class="login-form" action="{{route('login')}}" method="post">
            @csrf
            <div class="form-header">
                <h3>Connexion</h3>
                <p>Accès au tableau de bord</p>
            </div>
            <div class="form-group">
                <label>
                    <input type="text" name="email" class="form-input" placeholder="email@example.com">
                </label>
            </div>
            <div class="form-group">
                <label>
                    <input type="password" name="password" class="form-input" placeholder="password">
                </label>
            </div>
            <div class="form-group remember">
                <label for="remember">Remember</label>
                <input type="checkbox" name="remember" id="remember" class="form-input">
            </div>
            <div class="form-group">
                <button class="form-button" type="submit">Login</button>
            </div>
            <div class="form-footer">
                <a href="{{route('register')}}">Créez un compte</a>
            </div>
        </form>
    </div>
</x-guest-layout>
