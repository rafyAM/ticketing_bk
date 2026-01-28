<x-layouts.admin title="Detail Metode Pembayaran">
    <div class="container mx-auto p-10">
        @if (session('success'))
            <div class="toast toast-bottom toast-center z-50">
                <div class="alert alert-success">
                    <span>{{ session('success') }}</span>
                </div>
            </div>

            <script>
                setTimeout(() => {
                    document.querySelector('.toast')?.remove()
                }, 3000)
            </script>
        @endif
        <div class="card bg-base-100 shadow-sm">
            <div class="card-body">
                <h2 class="card-title text-2xl mb-6">Detail Metode Pembayaran</h2>

                <!-- Kode Pembayaran -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold">Kode Pembayaran</span>
                    </label>
                    <input type="text" class="input input-bordered w-full" value="{{ $payment->kode_pembayaran }}" disabled />
                </div>

                <!-- Metode Pembayaran -->
                <div class="form-control mt-4">
                    <label class="label">
                        <span class="label-text font-semibold">Metode Pembayaran</span>
                    </label>
                    <input type="text" class="input input-bordered w-full" value="{{ $payment->metode_pembayaran }}" disabled />
                </div>

                <!-- Tanggal Dibuat -->
                <div class="form-control mt-4">
                    <label class="label">
                        <span class="label-text font-semibold">Tanggal Dibuat</span>
                    </label>
                    <input type="text" class="input input-bordered w-full" value="{{ $payment->created_at->format('d/m/Y H:i') }}" disabled />
                </div>

                <!-- Terakhir Diupdate -->
                <div class="form-control mt-4">
                    <label class="label">
                        <span class="label-text font-semibold">Terakhir Diupdate</span>
                    </label>
                    <input type="text" class="input input-bordered w-full" value="{{ $payment->updated_at->format('d/m/Y H:i') }}" disabled />
                </div>

                <!-- Action Buttons -->
                <div class="card-actions justify-end mt-6">
                    <a href="{{ route('admin.payments.index') }}" class="btn btn-ghost">Kembali</a>
                    <a href="{{ route('admin.payments.edit', $payment->id) }}" class="btn btn-primary">Edit</a>
                    <button class="btn bg-red-500 text-white" onclick="openDeleteModal({{ $payment->id }})">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <dialog id="delete_modal" class="modal">
        <form method="POST" class="modal-box">
            @csrf
            @method('DELETE')

            <h3 class="text-lg font-bold mb-4">Hapus Metode Pembayaran</h3>
            <p>Apakah Anda yakin ingin menghapus metode pembayaran ini?</p>
            <div class="modal-action">
                <button class="btn btn-primary" type="submit">Hapus</button>
                <button class="btn" onclick="delete_modal.close()" type="button">Batal</button>
            </div>
        </form>
    </dialog>

    <script>
        function openDeleteModal(id) {
            const form = document.querySelector('#delete_modal form');
            form.action = `/admin/payments/${id}`;
            delete_modal.showModal();
        }
    </script>
</x-layouts.admin>
