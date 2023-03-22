<div class="card mt-3 company-card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3">
                <div class="image-cont">
                    @if ($company->logo)
                        <img src="{{ Storage::url($company->logo)}}" alt="">
                    @else
                        <img src="/images/user.png" alt="" style="max-width: 100px;">
                    @endif
                </div>
            </div>

            <div class="col-sm-6">
                <h5>{{ $company->name }}</h5>
                <h5>ID: {{ $company->id }}</h5>
                <ul class="list-unstyled">
                    <li>
                        <strong>Email: </strong>{{ $company->email }}
                    </li>
                    <li>
                        <strong>Website: </strong>{{ $company->website }}
                    </li>
                </ul>
            </div>
            <div class="col-sm-3 edit-company">
                <a href="{{ route('companies.edit', ['company' => $company->id]) }}" class="text-decoration-none muted-green">Edit</a>
            </div>
        </div>

    </div>
</div>