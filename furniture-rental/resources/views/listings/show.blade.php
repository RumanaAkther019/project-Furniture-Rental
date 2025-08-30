<!DOCTYPE html>
<html>
<head>
    <title>{{ $listing->item_name }} - Furniture Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="mb-0"><i class="fas fa-eye"></i> Furniture Details</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5><i class="fas fa-tag"></i> Item Name:</h5>
                                <p class="lead">{{ $listing->item_name }}</p>
                            </div>
                            <div class="col-md-6">
                                <h5><i class="fas fa-star"></i> Condition:</h5>
                                <p>
                                    @if($listing->condition == 'Excellent')
                                        <span class="badge bg-success fs-6">{{ $listing->condition }}</span>
                                    @elseif($listing->condition == 'Good')
                                        <span class="badge bg-primary fs-6">{{ $listing->condition }}</span>
                                    @elseif($listing->condition == 'Fair')
                                        <span class="badge bg-warning fs-6">{{ $listing->condition }}</span>
                                    @else
                                        <span class="badge bg-danger fs-6">{{ $listing->condition }}</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <h5><i class="fas fa-dollar-sign"></i> Rent per Month:</h5>
                                <p class="lead text-success">${{ number_format($listing->rent_per_month, 2) }}</p>
                            </div>
                            <div class="col-md-6">
                                <h5><i class="fas fa-check-circle"></i> Availability:</h5>
                                <p>
                                    @if($listing->availability)
                                        <span class="badge bg-success fs-6"><i class="fas fa-check"></i> Available</span>
                                    @else
                                        <span class="badge bg-danger fs-6"><i class="fas fa-times"></i> Not Available</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        
                        <hr>
                        
                        <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                            <a href="{{ route('listings.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back to List
                            </a>
                            <div>
                                <a href="{{ route('listings.edit', $listing->id) }}" class="btn btn-warning me-2">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('listings.destroy', $listing->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this furniture item?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>