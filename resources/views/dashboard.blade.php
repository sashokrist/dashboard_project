@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Dashboard</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="row" id="button-grid">
            @foreach ($buttons as $button)
                <div class="col-md-4 mb-4 d-flex justify-content-center">
                    <div class="card text-center" style="width: 100%; min-height: 140px; padding: 10px; cursor: pointer;"
                         onclick="handleButtonClick('{{ $button->id }}', '{{ $button->link }}')">
                        <div class="card-body" style="background-color: {{ $button->color }}; border-radius: 8px;">
                            <h5 class="text-white">{{ $button->title ?: 'Unnamed Button' }}</h5>
                            @if ($button->user_id === auth()->id())
                                <div class="d-flex justify-content-center mt-3">
                                    <!-- Config Button to Open Modal -->
                                    <button type="button" class="btn btn-warning btn-sm mr-2" style="width: 70px;"
                                            onclick="event.stopPropagation(); openEditModal({{ $button->id }}, '{{ $button->title }}', '{{ $button->link }}', '{{ $button->color }}')">
                                        Config
                                    </button>

                                    <!-- Delete Button -->
                                    <form action="{{ route('buttons.destroy', $button->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" style="width: 70px;"
                                                onclick="event.stopPropagation(); return confirm('Are you sure you want to delete this button?');">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col-md-4 mb-4 d-flex justify-content-center">
                <button id="new-link-button" class="btn btn-primary" onclick="createNewLink()" style="width: 100px; height: 40px;" title="Create a new button link">
                    New Link
                </button>
            </div>
        </div>
    </div>

    <!-- Edit Button Modal -->
    <div class="modal fade" id="editButtonModal" tabindex="-1" role="dialog" aria-labelledby="editButtonModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editButtonModalLabel">Edit Button</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="alert-success" class="alert alert-success d-none"></div>
                    <div id="alert-error" class="alert alert-danger d-none"></div>

                    <form id="edit-button-form">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="modal-title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="url" name="link" id="modal-link" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="color">Color</label>
                            <input type="color" name="color" id="modal-color" class="form-control" style="width: 60px; padding: 0;">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <!-- Save Changes Button -->
                    <button type="button" class="btn btn-primary" onclick="submitEditForm()">Save Changes</button>
                    <!-- Cancel Button -->
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery and Bootstrap JS libraries in the correct order -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Function to open the edit modal and populate it with button data
        function openEditModal(buttonId, title, link, color) {
            document.getElementById('modal-title').value = title;
            document.getElementById('modal-link').value = link;
            document.getElementById('modal-color').value = color;
            document.getElementById('edit-button-form').setAttribute('data-id', buttonId); // Store the button ID
            $('#editButtonModal').modal('show'); // Open the modal
        }

        // Function to handle form submission via AJAX
        function submitEditForm() {
            let buttonId = document.getElementById('edit-button-form').getAttribute('data-id');
            let title = document.getElementById('modal-title').value;
            let link = document.getElementById('modal-link').value;
            let color = document.getElementById('modal-color').value;

            fetch(`/buttons/${buttonId}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ title, link, color })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('alert-success').innerHTML = data.message;
                        document.getElementById('alert-success').classList.remove('d-none');
                        $('#editButtonModal').modal('hide'); // Hide the modal using jQuery
                        location.reload(); // Refresh the page to show changes
                    } else {
                        document.getElementById('alert-error').innerHTML = data.message || 'An error occurred while updating the button.';
                        document.getElementById('alert-error').classList.remove('d-none');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('alert-error').innerHTML = 'An unexpected error occurred.';
                    document.getElementById('alert-error').classList.remove('d-none');
                });
        }

        function handleButtonClick(buttonId, link) {
            if (link) {
                window.open(link, '_blank');
            } else {
                openEditModal(buttonId, '', '', '#000000'); // Open modal if no link is set
            }
        }

        function createNewLink() {
            const title = '';
            const link = '';
            const color = '#000000';

            fetch('{{ route('buttons.store') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ title, link, color })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Failed to create new link.');
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
@endsection
