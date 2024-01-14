<a href="{{route('accueil')}}"><button>🏛 Accueil</button></a>
<a href="{{route('apropos')}}"><button>ℹ️ A Propos</button></a>
<a href="{{route('contact')}}"><button>📞 Contacts</button></a>
<a href="{{route('sports.index')}}"><button>📜 Sports</button></a>
@auth
    @can('create', \App\Models\Sport::class)
        <a href="{{route('sports.create')}}"><button>➕ Ajouter un sport</button></a>
    @endcan
@endauth
<div class="menu toRight">
    @auth
        <div>
            {{Auth::user()->name}}
            <button><a href="#" id="logout"><i class="fas fa-right-from-bracket"></i> Logout</a>
            </button>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
        <script>
            document.getElementById('logout').addEventListener("click", (event) => {
                document.getElementById('logout-form').submit();
            });
        </script>
    @endauth
    @guest
    <a href="{{route('login')}}"><button>🔒 Connexion</button></a>
    <a href="{{route('register')}}"><button>🔒 Enregistrement</button></a>
        @endguest
</div>
