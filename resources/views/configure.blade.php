<form action="{{ route('configure', $button->id) }}" method="POST">
    @csrf
    <label>Title</label>
    <input type="text" name="title" value="{{ $button->title }}">
    <label>Link</label>
    <input type="url" name="link" value="{{ $button->link }}">
    <label>Color</label>
    <input type="color" name="color" value="{{ $button->color }}">
    <button type="submit">Save</button>
</form>
