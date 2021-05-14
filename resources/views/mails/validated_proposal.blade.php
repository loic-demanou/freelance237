<div class="container">
    <p>hey!</p>
    <p>votre proposition pour le l'emploi {{ $job_post_title }} a été validée par {{ $user_job_post->name}}</p>
    <button class="btn btn-primary"></button>
    <strong><a href="{{ route('conversation.index') }}" class="btn btn-primary">Voir plus</a></strong>
</div>
