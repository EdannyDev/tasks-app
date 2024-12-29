<nav class="bg-gray-800 p-4 fixed w-full top-0 left-0 z-50">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ route('tasks.index') }}" class="text-white text-2xl font-bold">
         <i class="fa-solid fa-list"></i>
          Task Solutions
        </a>
        
        @auth
            <div class="flex items-center space-x-4">
                <!-- Botón de Cerrar Sesión -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center text-white focus:outline-none">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        <span class="hidden md:inline">Cerrar Sesión</span>
                    </button>
                </form>
            </div>
        @endauth
    </div>
</nav>