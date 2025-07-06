@extends("admin.layouts.admin")

@section("title", "All Mails")

@section("content")
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
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mails as $key => $mail)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $mail->name }}</td>
                            <td>{{ $mail->email }}</td>
                            <td>{{ $mail->subject }}</td>
                            <td>
                                <a href="{{ route('admin.send_mails.edit', $mail->id) }}" class="btn btn-info btn-sm">Edit</a>
                                <form action="{{ route('admin.send_mails.destroy', $mail->id) }}" method="POST" style="display:inline-block;">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this mail?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="text-center">No mails found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
{{-- </div> --}}
@endsection
