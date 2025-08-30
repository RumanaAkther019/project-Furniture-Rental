<!DOCTYPE html>
<html>
<head>
    <title>Furniture Rental Listings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mb-4"><i class="fas fa-couch"></i> Furniture Rental Listings</h1>
                
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                <a href="{{ route('listings.create') }}" class="btn btn-primary mb-3">
                    <i class="fas fa-plus"></i> Add New Furniture
                </a>
                
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th><i class="fas fa-tag"></i> Item Name</th>
                                    <th><i class="fas fa-star"></i> Condition</th>
                                    <th><i class="fas fa-dollar-sign"></i> Rent/Month</th>
                                    <th><i class="fas fa-check-circle"></i> Availability</th>
                                    <th><i class="fas fa-cog"></i> Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($listings as $listing)
                                <tr>
                                    <td>{{ $listing->item_name }}</td>
                                    <td>
                                        @if($listing->condition == 'Excellent')
                                            <span class="badge bg-success">{{ $listing->condition }}</span>
                                        @elseif($listing->condition == 'Good')
                                            <span class="badge bg-primary">{{ $listing->condition }}</span>
                                        @elseif($listing->condition == 'Fair')
                                            <span class="badge bg-warning">{{ $listing->condition }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ $listing->condition }}</span>
                                        @endif
                                    </td>
                                    <td>${{ number_format($listing->rent_per_month, 2) }}</td>
                                    <td>
                                        @if($listing->availability)
                                            <span class="badge bg-success"><i class="fas fa-check"></i> Available</span>
                                        @else
                                            <span class="badge bg-danger"><i class="fas fa-times"></i> Not Available</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('listings.show', $listing->id) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                            <a href="{{ route('listings.edit', $listing->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('listings.destroy', $listing->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this furniture item?')">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <div class="py-4">
                                            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                            <h5>No furniture items found</h5>
                                            <p class="text-muted">Get started by adding your first furniture item!</p>
                                            <a href="{{ route('listings.create') }}" class="btn btn-primary">
                                                <i class="fas fa-plus"></i> Add Furniture
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>