<div class="card mt-3 company-card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3">
                <div class="image-cont">
                    {{-- @if ($student->logo)
                        <img src="{{ Storage::url($student->logo)}}" alt="">
                    @else
                        <img src="/images/user.png" alt="" style="max-width: 100px;">
                    @endif --}}
                </div>
            </div>

            <div class="col-sm-6">
                <h5>{{ $student->name }}</h5>
                <ul class="list-unstyled">
                    <li>
                        <strong>Email: </strong>{{ $student->email }}
                    </li>
                    <li>
                        <strong>Website: </strong>{{ $student->website }}
                    </li>
                </ul>
            </div>
            <div class="col-sm-3 edit-company">
                <a href="{{ route('students.edit', ['student' => $student->id]) }}" class="text-decoration-none muted-green">Edit</a>
            </div>
        </div>

    </div>
</div>