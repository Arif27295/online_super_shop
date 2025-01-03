@if(Auth::check())
<form action="{{ route('reviews.store') }}" method="POST">
    @csrf
    <input type="hidden" name="product_id" value="">
    <textarea name="review" placeholder="Write your review here" required></textarea>
    <label for="rating">Rating:</label>
    <select name="rating" required>
        <option value="1">1 Star</option>
        <option value="2">2 Stars</option>
        <option value="3">3 Stars</option>
        <option value="4">4 Stars</option>
        <option value="5">5 Stars</option>
    </select>
    <button type="submit">Submit Review</button>
</form>
@else
<p>Please <a href="{{ route('login') }}">login</a> to write a review.</p>
@endif
