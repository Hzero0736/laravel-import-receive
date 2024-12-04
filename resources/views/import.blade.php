@extends('layouts.app')

@section('content')
<div class="row">
    <!-- Tabel Data Sheet 3 -->
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <span><i class="fas fa-table me-2"></i>Data Sheet 3</span>
                <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#importModal">
                    <i class="fas fa-upload me-1"></i>Import Data
                </button>
            </div>
            <div class="card-body p-3">
                <div class="table-responsive">
                    <table id="sheet3-table" class="table table-bordered table-hover table-striped align-middle table-sm">
                        <thead class="table-primary text-center">
                            <tr>
                                <th>No</th>
                                <th>Contract</th>
                                <th>Purchase Order</th>
                                <th>Incoterm</th>
                                <th>Start Delivery</th>
                                <th>End Delivery</th>
                                <th>Commodity</th>
                                <th>Quality Text</th>
                                <th>Dasar Timbangan</th>
                                <th>Quality</th>
                                <th>Late Percentage</th>
                                <th>Total Receive</th>
                                <th>Count Outspec</th>
                                <th>Count Total</th>
                                <th>Certification</th>
                                <th>Quality Weight</th>
                                <th>Deliverables</th>
                                <th>Certificate Weight</th>
                                <th>NCCR</th>
                                <th>Contamination</th>
                                <th>Susut</th>
                                <th>Total</th>
                                <th>Value</th>
                                <th>Total2</th>
                                <th>Mill</th>
                            </tr>
                        </thead>
                        <tbody class="small">
                            @forelse($sheet3 as $s)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $s->Contract }}</td>
                                <td>{{ $s->PurchaseOrder }}</td>
                                <td>{{ $s->Incoterm }}</td>
                                <td>{{ date('d/m/Y', strtotime($s->StartDelivery)) }}</td>
                                <td>{{ date('d/m/Y', strtotime($s->EndDelivery)) }}</td>
                                <td>{{ $s->Commodity }}</td>
                                <td>{{ $s->QualityText }}</td>
                                <td>{{ $s->DasarTimbangan }}</td>
                                <td class="text-end">{{ $s->formatted_quality }}</td>
                                <td class="text-end">{{ $s->formatted_late_percentage }}</td>
                                <td class="text-end">{{ $s->formatted_total_receive }}</td>
                                <td class="text-center">{{ $s->CountOutspec == 0 ? '-' : $s->CountOutspec }}</td>
                                <td class="text-center">{{ $s->CountTotal == 0 ? '-' : $s->CountTotal }}</td>
                                <td>{{ $s->Certification }}</td>
                                <td class="text-end">{{ $s->formatted_quality_weight }}</td>
                                <td>{{ $s->Deliverables }}</td>
                                <td class="text-end">{{ $s->CertificateWeight == 0 ? '-' : $s->CertificateWeight }}</td>
                                <td class="text-end">{{ $s->formatted_nccr }}</td>
                                <td class="text-end">{{ $s->formatted_contamination }}</td>
                                <td class="text-end">{{ $s->Susut == 0 ? '-' : $s->Susut }}</td>
                                <td class="text-end">{{ $s->formatted_total }}</td>
                                <td class="text-end">{{ $s->formatted_value }}</td>
                                <td class="text-center">{{ $s->Total2 }}</td>
                                <td>{{ $s->Mill }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="25" class="text-center">No data available</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Import Modal -->
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="importModalLabel">
                    <i class="fas fa-upload me-2"></i>Import Data
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/import/sheet3') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="fas fa-file-excel me-1 text-success"></i>Sheet 3
                        </label>
                        <input type="file" name="file" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-file-import me-1"></i>Import Sheet 3
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection