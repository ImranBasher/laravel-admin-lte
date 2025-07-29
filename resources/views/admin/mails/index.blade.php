@extends("admin.layouts.admin")

@section("title", "All Mails")

@section("content")

<style>
.badge.bg-warning {
    font-size: 0.75rem;
    padding: 0.25em 0.4em;
}
</style>

{{-- <div class="content-wrapper"> --}}
    <section class="content-header">
        <h1>All Mails</h1>
        <a href="{{ route('admin.send_mails.create') }}" class="btn btn-primary float-left">Add Mail</a>
    </section>
 <br>
    <section class="content">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mails as $key => $mail)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $mail->name }}
                            @if(!$mail->read_data)
                                        <span class="badge bg-warning text-dark">New</span>
                            @endif


                            </td>
                            <td>{{ $mail->email }}</td>
                            <td>{{ $mail->subject }}</td>
                            <td>{{ $mail->created_at->format('d M Y, h:i A') }}</td>
                            <td>
                                <button 
                                    class="btn btn-primary btn-sm view-mail-btn"
                                    data-mail-id="{{ $mail->id }}"
                                    data-bs-toggle="modal"
                                    data-bs-target="#mailModal{{ $mail->id }}">
                                    View
                                </button>

                                <a href="{{ route('admin.send_mails.edit', $mail->id) }}" class="btn btn-info btn-sm">Edit</a>
                                <form action="{{ route('admin.send_mails.destroy', $mail->id) }}" method="POST" style="display:inline-block;">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this mail?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                            <div class="modal fade" id="mailModal{{ $mail->id }}" tabindex="-1" aria-labelledby="mailModalLabel{{ $mail->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="mailModalLabel{{ $mail->id }}">{{ $mail->subject }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Name:</strong> {{ $mail->name }}</p>
                                            <p><strong>Email:</strong> {{ $mail->email }}</p>
                                            @if($mail->phone)
                                                <p><strong>Phone:</strong> {{ $mail->phone }}</p>
                                            @endif
                                            <p><strong>Date:</strong> {{ $mail->created_at->format('d M Y, h:i A') }}</p>
                                            <hr>
                                            <p><strong>Message:</strong><br>{{ $mail->message }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @empty
                        <tr><td colspan="5" class="text-center">No mails found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('.view-mail-btn').forEach(button => {
            button.addEventListener('click', function () {
                const mailId = this.getAttribute('data-mail-id');

                fetch(`/admin/send-mails/${mailId}/mark-read`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                });
            });
        });
    });
</script>




{{-- </div> --}}
@endsection
