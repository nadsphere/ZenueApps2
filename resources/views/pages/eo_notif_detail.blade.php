@extends('layout.app')
@section('body_class', 'is-eo-notif-detail')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/eo_notif_detail.css') }}">
@endpush
@section('content')
    <main id="main">
    <section class="section-content bg padding-y">
            <br />
        <div class="container">
          <div class="row mt-4">
              <main class="mt-4 col-lg-12 col-xl-12 col-md-12">
                  <div class="card">
                    <div class="card-header">
                        EO0001 - Detail Notifikasi
                    </div>
                    <div class="card-body ml-3">
                        <div class="row">
                            <aside>
                                <h4 class="title font-weight-bold"> EO0001</h4> <hr>
                            </aside>
                        </div>
                        <div class="row">
                            <article class="col-sm-12 mt-1">
                              <p class="text-dark">awoakawkaokwoakwoa</p>
                            </article>
                        </div>

                    </div>
                  </div>
              </main>
          </div>
        </div>
        <br />
    </section>

    </main>


@endsection
