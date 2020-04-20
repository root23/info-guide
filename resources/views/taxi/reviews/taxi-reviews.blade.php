@foreach($reviews as $review)
    <div class="media border p-3">
        <div class="media-body">
            <h4>{{ $review->name }}<small><i> Добавлено {{ $review->created_at->format('d.m.Y H:i') }}</i></small></h4>
            <p>{{ $review->message }}</p>
        </div>
        <img src="/img/img_avatar<?php echo random_int(1, 3); ?>.png" alt="John Doe" class="ml-3 mt-3 rounded-circle" style="width:60px;">
    </div>
@endforeach



