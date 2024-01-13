<x-layout :titre="$titre">
    <h3>Accueil</h3>
    <p>Bienvenue sur tp-jo-2024 !</p>
    <img class="img accueil" src="{{ Vite::asset('resources/images/jo.jpg') }}" alt="jo" />
    <x-message-info titre="Météo du jour" :message="$message">
        <p>Ces informations ont été obtenues sur le site <a href="https://meteofrance.com/">météo france</a></p>
    </x-message-info>
</x-layout>
