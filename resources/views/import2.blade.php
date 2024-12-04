@extends('layouts.app')

@section('content')
<!-- Modal Import -->
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="importModalLabel">Import Sheet 2 Data</h6>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show py-2" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <form action="{{ route('import.sheet2') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="file" class="form-label small">Pilih File Excel</label>
                        <input type="file" class="form-control form-control-sm" id="file" name="file" accept=".xlsx, .xls, .csv">
                        @error('file')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fas fa-upload me-1"></i>Import Data
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-2">
        <h6 class="mb-0">Data Sheet 2</h6>
        <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#importModal">
            <i class="fas fa-upload me-1"></i>Import Data
        </button>
    </div>
    <div class="card-body p-2">
        <div class="table-responsive">
            <table id="sheet2-table" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Receiving Date</th>
                        <th>Data Num</th>
                        <th>License Plate</th>
                        <th>Contract</th>
                        <th>Purchase Order</th>
                        <th>Supplier</th>
                        <th>Mill</th>
                        <th>Netto Kebun</th>
                        <th>Netto Pabrik</th>
                        <th>Netto Var</th>
                        <th>Act FFA Mill</th>
                        <th>Act Imp Mill</th>
                        <th>Act Moist Mill</th>
                        <th>Act DOBI Mill</th>
                        <th>Act TVM Mill</th>
                        <th>Certification</th>
                        <th>Act FFA</th>
                        <th>Act Moist</th>
                        <th>Act DOBI</th>
                        <th>Act Imp</th>
                        <th>Act TVM</th>
                        <th>Act Batu</th>
                        <th>Inco Term</th>
                        <th>Commodity</th>
                        <th>FFA</th>
                        <th>Impurities</th>
                        <th>Moist</th>
                        <th>DOBI</th>
                        <th>TVM</th>
                        <th>Imp TVM</th>
                        <th>Quality Overall</th>
                        <th>Deliverables</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sheet2 as $data)
                    <tr>
                        <td>{{ date('d/m/Y', strtotime($data->ReceivingDate)) }}</td>
                        <td>{{ $data->DataNum }}</td>
                        <td>{{ $data->LicensePlate }}</td>
                        <td>{{ $data->Contract }}</td>
                        <td>{{ $data->PurchaseOrder }}</td>
                        <td>{{ $data->Supplier }}</td>
                        <td>{{ $data->Mill }}</td>
                        <td>{{ $data->NettoKebun }}</td>
                        <td>{{ $data->NettoPabrik }}</td>
                        <td>{{ $data->NettoVar }}</td>
                        <td>{{ $data->ActFFAMill }}</td>
                        <td>{{ $data->ActImpMill }}</td>
                        <td>{{ $data->ActMoistMill }}</td>
                        <td>{{ $data->ActDOBIMill }}</td>
                        <td>{{ $data->ActTVMMill }}</td>
                        <td>{{ $data->Certification }}</td>
                        <td>{{ $data->ActFFA }}</td>
                        <td>{{ $data->ActMoist }}</td>
                        <td>{{ $data->ActDOBI }}</td>
                        <td>{{ $data->ActImp }}</td>
                        <td>{{ $data->ActTVM }}</td>
                        <td>{{ $data->ActBatu }}</td>
                        <td>{{ $data->IncoTerm }}</td>
                        <td>{{ $data->Commodity }}</td>
                        <td>{{ $data->FFA }}</td>
                        <td>{{ $data->Impurities }}</td>
                        <td>{{ $data->Moist }}</td>
                        <td>{{ $data->DOBI }}</td>
                        <td>{{ $data->TVM }}</td>
                        <td>{{ $data->Imp_TVM }}</td>
                        <td>{{ $data->QualityOverall }}</td>
                        <td>{{ $data->Deliverables }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection