@component('mail::message')
# Bienvenue {{ $users->nom }}

Merci de vous être enregistré(e) avec l'adresse {{ $users->email }}

Votre mot de passe est: {{ $users->password }}

Veuillez bien garder secret ce mot de passe.
@endcomponent
