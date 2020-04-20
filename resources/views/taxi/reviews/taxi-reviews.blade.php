@foreach($reviews as $review)
    <div class="media text-muted pt-3 comment-body">
        <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">{{ $review->name }}</strong>
            {{ $review->message }}
            <strong class="comment-time"><i class="fa fa-calendar"></i>{{ $review->created_at->format('d.m.Y H:i') }}</strong>
        </p>
    </div>
@endforeach
