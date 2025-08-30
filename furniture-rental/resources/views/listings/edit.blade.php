<!DOCTYPE html>
<html>
<head>
    <title>Edit Furniture - Rental Listings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="mb-0"><i class="fas fa-edit"></i> Edit Furniture</h1>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <form action="{{ route('listings.update', $listing->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <label for="item_name" class="form-label">
                                    <i class="fas fa-tag"></i> Item Name
                                </label>
                                <input type="text" class="form-control" id="item_name" name="item_name" 
                                       value="{{ $listing->item_name }}" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="condition" class="form-label">
                                    <i class="fas fa-star"></i> Condition
                                </label>
                                <select class="form-control" id="condition" name="condition" required>
                                    <option value="">Select Condition</option>
                                    <option value="Excellent" {{ $listing->condition == 'Excellent' ? 'selected' : '' }}>Excellent</option>
                                    <option value="Good" {{ $listing->condition == 'Good' ? 'selected' : '' }}>Good</option>
                                    <option value="Fair" {{ $listing->condition == 'Fair' ? 'selected' : '' }}>Fair</option>
                                    <option value="Poor" {{ $listing->condition == 'Poor' ? 'selected' : '' }}>Poor</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="rent_per_month" class="form-label">
                                    <i class="fas fa-dollar-sign"></i> Rent per Month ($)
                                </label>
                                <input type="number" step="0.01" class="form-control" id="rent_per_month" 
                                       name="rent_per_month" min="0" value="{{ $listing->rent_per_month }}" required>
                            </div>
                            
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="availability" 
                                           name="availability" value="1" 
                                           {{ $listing->availability ? 'checked' : '' }}>
                                    <label class="form-check-label" for="availability">
                                        <i class="fas fa-check-circle"></i> Available for Rent
                                    </label>
                                </div>
                            </div>
                            
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('listings.index') }}" class="btn btn-secondary me-md-2">
                                    <i class="fas fa-times"></i> Cancel
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update Furniture
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>