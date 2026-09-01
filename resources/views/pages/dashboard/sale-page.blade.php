@extends('layout.sidenav-layout')

@section('content')

<style>
    /* =========================
       POS PAGE UI
    ========================= */

    .pos-page {
        background: #f7f8fb;
        min-height: calc(100vh - 20px);
    }

    .pos-card {
        background: #fff;
        border: 1px solid #edf0f4;
        border-radius: 14px;
        box-shadow: 0 3px 15px rgba(0, 0, 0, 0.04);
        overflow: hidden;
    }

    .pos-card-header {
        padding: 16px 18px;
        border-bottom: 1px solid #eef0f3;
        background: #fff;
    }

    .pos-card-title {
        font-size: 14px;
        font-weight: 700;
        color: #252b35;
        margin: 0;
    }

    .pos-card-subtitle {
        font-size: 11px;
        color: #8b929d;
        margin-top: 3px;
    }

    /* Invoice */

    .invoice-card {
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .invoice-top {
        padding: 18px;
        border-bottom: 1px solid #eef0f3;
    }

    .billed-label {
        font-size: 10px;
        font-weight: 800;
        letter-spacing: .8px;
        color: #8b929d;
        margin-bottom: 8px;
    }

    .customer-name-display {
        font-size: 16px;
        font-weight: 700;
        color: #252b35;
        margin-bottom: 8px;
    }

    .customer-meta {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 11px;
        color: #737b87;
        margin-bottom: 5px;
    }

    .customer-meta i {
        font-size: 12px;
    }

    .invoice-brand {
        text-align: right;
    }

    .invoice-brand img {
        width: 90px;
        max-height: 48px;
        object-fit: contain;
        margin-bottom: 8px;
    }

    .invoice-title {
        font-size: 15px;
        font-weight: 800;
        color: #252b35;
        margin: 0 0 4px;
    }

    .invoice-date {
        font-size: 10px;
        color: #8b929d;
        margin: 0;
    }

    /* Invoice table */

    .invoice-items-wrapper {
        padding: 12px 18px;
    }

    .invoice-table {
        margin: 0;
    }

    .invoice-table thead {
        background: #f8f9fb;
    }

    .invoice-table thead td {
        font-size: 9px;
        font-weight: 800;
        text-transform: uppercase;
        color: #8b929d;
        border: 0;
        padding: 10px 8px;
    }

    .invoice-table tbody td {
        font-size: 11px;
        color: #414752;
        padding: 11px 8px;
        vertical-align: middle;
        border-color: #f0f1f4;
    }

    .invoice-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .remove {
        color: #dc3545 !important;
        cursor: pointer;
        font-size: 10px !important;
        font-weight: 600;
    }

    .remove:hover {
        background: #fff1f2 !important;
    }

    /* Summary */

    .summary-section {
        padding: 0 18px 18px;
        margin-top: auto;
    }

    .summary-box {
        background: #fafbfc;
        border: 1px solid #edf0f3;
        border-radius: 12px;
        padding: 14px;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 11px;
        color: #68707c;
        margin-bottom: 10px;
    }

    .summary-row:last-child {
        margin-bottom: 0;
    }

    .summary-label {
        color: #3d434d;
        font-weight: 700;
    }

    .summary-value {
        font-weight: 600;
        color: #333943;
    }

    .payable-row {
        border-top: 1px dashed #dfe2e7;
        margin-top: 12px;
        padding-top: 13px;
    }

    .payable-row .summary-label {
        font-size: 12px;
    }

    .payable-row .summary-value {
        font-size: 15px;
        font-weight: 800;
    }

    .paid-row {
        background: #f0faf5;
        border-radius: 8px;
        padding: 9px 10px;
        margin-top: 10px;
        margin-bottom: 0;
    }

    .paid-row .summary-label,
    .paid-row .summary-value {
        color: #198754;
    }

    .vat-input {
        width: 52px;
        height: 25px !important;
        display: inline-block;
        margin-left: 5px;
        border-radius: 6px;
        font-size: 10px !important;
        padding: 3px 5px !important;
    }

    /* Invoice controls */

    .invoice-controls {
        margin-top: 12px;
    }

    .control-label {
        font-size: 9px;
        color: #7d8591;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .control-input {
        height: 36px !important;
        font-size: 11px !important;
        border-radius: 8px !important;
        border-color: #e3e6eb !important;
    }

    .due-button {
        height: 36px;
        border-radius: 8px;
        font-size: 10px;
        font-weight: 700;
    }

    .confirm-button {
        height: 44px;
        border-radius: 9px;
        font-size: 12px;
        font-weight: 700;
        margin-top: 12px;
    }

    /* Product / Customer */

    .side-card {
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .side-card-body {
        padding: 10px 14px 14px;
        flex: 1;
    }

    .add-btn {
        border-radius: 7px;
        font-size: 10px;
        font-weight: 700;
        padding: 6px 10px;
    }

    .pos-table {
        margin-bottom: 0;
    }

    .pos-table thead {
        background: #f8f9fb;
    }

    .pos-table thead td {
        border: 0;
        padding: 9px 8px;
        font-size: 9px;
        font-weight: 800;
        color: #858d98;
        text-transform: uppercase;
    }

    .pos-table tbody td {
        padding: 9px 8px;
        border-color: #f0f1f4;
        vertical-align: middle;
        font-size: 10px;
        color: #454b55;
    }

    .pos-table tbody tr:hover {
        background: #fafbfc;
    }

    .product-image {
        width: 32px;
        height: 32px;
        border-radius: 7px;
        object-fit: cover;
        border: 1px solid #edf0f3;
        margin-right: 6px;
        vertical-align: middle;
    }

    .pick-btn {
        border-radius: 6px;
        font-size: 9px !important;
        font-weight: 700;
        padding: 5px 9px !important;
    }

    /* Empty invoice */

    #invoiceList:empty:after {
        content: "No products added yet";
        display: block;
        text-align: center;
        padding: 35px 10px;
        color: #a0a7b1;
        font-size: 10px;
    }

    /* Modals */

    .modal-content {
        border: 0;
        border-radius: 14px;
        box-shadow: 0 15px 50px rgba(0,0,0,.15);
        overflow: hidden;
    }

    .modal-header {
        border-bottom: 1px solid #eef0f3;
        padding: 15px 18px;
    }

    .modal-title {
        font-size: 14px;
        font-weight: 700;
        color: #252b35;
    }

    .modal-body {
        padding: 18px;
    }

    .modal-footer {
        border-top: 1px solid #eef0f3;
        padding: 12px 18px;
    }

    .form-label {
        font-size: 10px;
        font-weight: 700;
        color: #555c67;
        margin-bottom: 5px;
    }

    .form-control,
    .form-select {
        border-color: #e2e5e9;
        border-radius: 8px;
        font-size: 11px;
        min-height: 36px;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #b8c0cc;
        box-shadow: 0 0 0 3px rgba(13,110,253,.06);
    }

    .modal-action {
        min-width: 80px;
        height: 35px;
        border-radius: 7px;
        font-size: 10px;
        font-weight: 700;
    }

    /* Due modal */

    .due-summary {
        background: #f8f9fb;
        border: 1px solid #edf0f3;
        border-radius: 10px;
        padding: 12px;
        margin-bottom: 15px;
    }

    .due-summary-label {
        font-size: 9px;
        color: #858d98;
        font-weight: 700;
        text-transform: uppercase;
    }

    .due-summary-value {
        font-size: 18px;
        font-weight: 800;
        color: #252b35;
    }

    /* Product image preview */

    #newImg {
        width: 75px;
        height: 75px;
        object-fit: cover;
        border-radius: 10px;
        border: 1px solid #e8eaee;
    }

    /* DataTables */

    .dataTables_wrapper .dataTables_filter {
        margin-bottom: 10px;
    }

    .dataTables_wrapper .dataTables_filter input {
        border: 1px solid #e2e5e9 !important;
        border-radius: 7px !important;
        font-size: 10px !important;
        padding: 5px 8px !important;
        outline: none;
    }

    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_paginate {
        font-size: 9px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 3px 7px !important;
        font-size: 9px !important;
        border-radius: 5px !important;
    }

    /* Responsive */

    @media (max-width: 991px) {
        .invoice-card,
        .side-card {
            min-height: auto;
        }

        .summary-section {
            margin-top: 0;
        }
    }

    @media (max-width: 767px) {
        .pos-page {
            padding-bottom: 20px;
        }

        .invoice-brand {
            text-align: left;
            margin-top: 15px;
        }

        .invoice-brand img {
            width: 75px;
        }

        .pos-card {
            border-radius: 10px;
        }
    }
</style>


<div class="container-fluid pos-page py-2">

    <div class="row g-3">

        {{-- =====================================================
             INVOICE / CART SECTION
        ====================================================== --}}
        <div class="col-12 col-lg-5">

            <div class="pos-card invoice-card">

                {{-- Invoice Header --}}
                <div class="invoice-top">

                    <div class="row align-items-start">

                        <div class="col-7">

                            <div class="billed-label">
                                BILLED TO
                            </div>

                            <div class="customer-name-display">
                                <span id="CName">Walk-in Customer</span>
                            </div>

                            <div class="customer-meta">
                                <i class="bi bi-telephone"></i>
                                <span id="CMobile">—</span>
                            </div>

                            <div class="customer-meta">
                                <i class="bi bi-person-badge"></i>
                                <span>User ID: <span id="CId">—</span></span>
                            </div>

                        </div>

                        <div class="col-5 invoice-brand">

                            <img src="{{ asset('images/logo.png') }}"
                                 alt="Logo">

                            <p class="invoice-title">
                                Invoice
                            </p>

                            <p class="invoice-date">
                                Date: {{ date('Y-m-d') }}
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Invoice Items --}}
                <div class="invoice-items-wrapper">

                    <table class="table w-100 invoice-table"
                           id="invoiceTable">

                        <thead>
                        <tr>
                            <td>Name</td>
                            <td>Qty</td>
                            <td>Total</td>
                            <td>Action</td>
                        </tr>
                        </thead>

                        <tbody id="invoiceList"></tbody>

                    </table>

                </div>


                {{-- Invoice Summary --}}
                <div class="summary-section">

                    <div class="summary-box">

                        {{-- Total --}}
                        <div class="summary-row">

                            <span class="summary-label">
                                TOTAL
                            </span>

                            <span class="summary-value">
                                ৳ <span id="total">0.00</span>
                            </span>

                        </div>


                        {{-- VAT --}}
                        <div class="summary-row">

                            <span class="summary-label d-flex align-items-center">

                                VAT

                                <input
                                    type="text"
                                    id="vatP"
                                    placeholder="0"
                                    oninput="this.value=this.value.replace(/[^0-9.]/g,''); CalculateGrandTotal();"
                                    class="form-control vat-input text-center"
                                >

                                <span class="ms-1">%</span>

                            </span>

                            <span class="summary-value">
                                ৳ <span id="vat">0.00</span>
                            </span>

                        </div>


                        {{-- Discount --}}
                        <div class="summary-row">

                            <span class="summary-label">
                                DISCOUNT
                            </span>

                            <span class="summary-value">
                                ৳ <span id="discount">0.00</span>
                            </span>

                        </div>


                        {{-- Payable --}}
                        <div class="summary-row payable-row">

                            <span class="summary-label">
                                PAYABLE
                            </span>

                            <span class="summary-value">
                                ৳ <span id="payable">0.00</span>
                            </span>

                        </div>


                        {{-- Paid --}}
                        <div class="summary-row paid-row">

                            <span class="summary-label">
                                PAID
                            </span>

                            <span class="summary-value">
                                ৳ <span id="paidDisplay">0.00</span>
                            </span>

                        </div>

                    </div>


                    {{-- Invoice Controls --}}
                    <div class="invoice-controls">

                        <div class="row g-2">

                            <div class="col-6">

                                <label class="control-label">
                                    DISCOUNT (৳)
                                </label>

                                <input
                                    value=""
                                    placeholder="0"
                                    min="0"
                                    type="text"
                                    step="1"
                                    oninput="CalculateGrandTotal()"
                                    class="form-control control-input"
                                    id="discountP"
                                >

                            </div>

                            <div class="col-6 d-flex align-items-end">

                                <button
                                    type="button"
                                    class="btn btn-outline-primary w-100 due-button"
                                    onclick="openDueModal()"
                                >
                                    <i class="bi bi-calendar2-check me-1"></i>
                                    ADD DUE
                                </button>

                            </div>

                        </div>


                        {{-- Confirm --}}
                        <button
                            onclick="createInvoice()"
                            class="btn bg-gradient-primary w-100 confirm-button"
                        >
                            <i class="bi bi-check2-circle me-1"></i>
                            Confirm Invoice
                        </button>

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
             PRODUCT SECTION
        ====================================================== --}}
        <div class="col-12 col-lg-4">

            <div class="pos-card side-card">

                <div class="pos-card-header">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <h6 class="pos-card-title">
                                Products
                            </h6>

                            <div class="pos-card-subtitle">
                                Select a product to add to invoice
                            </div>
                        </div>

                        <button
                            class="btn btn-sm btn-primary add-btn"
                            onclick="OpenProductModal()"
                        >
                            <i class="bi bi-plus-lg me-1"></i>
                            Add Product
                        </button>

                    </div>

                </div>


                <div class="side-card-body">

                    <table
                        class="table w-100 pos-table"
                        id="productTable"
                    >

                        <thead>
                        <tr>
                            <td>Product</td>
                            <td>Pick</td>
                        </tr>
                        </thead>

                        <tbody id="productList"></tbody>

                    </table>

                </div>

            </div>

        </div>


        {{-- =====================================================
             CUSTOMER SECTION
        ====================================================== --}}
        <div class="col-12 col-lg-3">

            <div class="pos-card side-card">

                <div class="pos-card-header">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <h6 class="pos-card-title">
                                Customers
                            </h6>

                            <div class="pos-card-subtitle">
                                Select billing customer
                            </div>
                        </div>

                        <button
                            class="btn btn-sm btn-primary add-btn"
                            onclick="OpenCustomerModal()"
                        >
                            <i class="bi bi-plus-lg me-1"></i>
                            Add
                        </button>

                    </div>

                </div>


                <div class="side-card-body">

                    <table
                        class="table table-sm w-100 pos-table"
                        id="customerTable"
                    >

                        <thead>
                        <tr>
                            <td>Customer</td>
                            <td>Pick</td>
                        </tr>
                        </thead>

                        <tbody id="customerList"></tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
     PRODUCT MODAL
========================================================= --}}

<div
    class="modal animated zoomIn"
    id="create-modal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
>

    <div class="modal-dialog modal-md modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h6 class="modal-title">
                    Add Product
                </h6>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                ></button>

            </div>


            <div class="modal-body">

                <form id="add-form">

                    <div class="row">

                        <div class="col-12">

                            <label class="form-label">
                                Product ID *
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="PId"
                            >


                            <label class="form-label mt-3">
                                Product Name *
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="PName"
                            >


                            <label class="form-label mt-3">
                                Product Price *
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="PPrice"
                            >


                            <label class="form-label mt-3">
                                Product Qty *
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="PQty"
                            >

                        </div>

                    </div>

                </form>

            </div>


            <div class="modal-footer">

                <button
                    id="modal-close"
                    class="btn btn-light modal-action"
                    data-bs-dismiss="modal"
                >
                    Close
                </button>

                <button
                    onclick="add()"
                    id="save-btn"
                    class="btn bg-gradient-success modal-action"
                >
                    <i class="bi bi-plus-lg me-1"></i>
                    Add
                </button>

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
     CUSTOMER MODAL
========================================================= --}}

<div
    class="modal animated zoomIn"
    id="createCustomerModal"
    tabindex="-1"
    aria-labelledby="createCustomerLabel"
    aria-hidden="true"
>

    <div class="modal-dialog modal-md modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Create Customer
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                ></button>

            </div>


            <div class="modal-body">

                <form id="createCustomerForm">

                    <div class="row">

                        <div class="col-12">

                            <label class="form-label">
                                Customer Name *
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="customerName"
                            >


                            <label class="form-label mt-3">
                                Customer Email *
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="customerEmail"
                            >


                            <label class="form-label mt-3">
                                Customer Mobile *
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="customerMobile"
                            >

                        </div>

                    </div>

                </form>

            </div>


            <div class="modal-footer">

                <button
                    id="modal-close-customer"
                    class="btn btn-light modal-action"
                    data-bs-dismiss="modal"
                >
                    Close
                </button>

                <button
                    onclick="SaveCustomer()"
                    id="save-customer-btn"
                    class="btn bg-gradient-success modal-action"
                >
                    <i class="bi bi-check-lg me-1"></i>
                    Save
                </button>

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
     DUE MODAL
========================================================= --}}

<div
    class="modal fade"
    id="dueModal"
    tabindex="-1"
>

    <div class="modal-dialog modal-md modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h6 class="modal-title">
                    Due Payment
                </h6>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                ></button>

            </div>


            <div class="modal-body">

                <div class="due-summary">

                    <div class="due-summary-label">
                        Total Payable
                    </div>

                    <div class="due-summary-value">
                        ৳ <span id="dueTotalPreview">0.00</span>
                    </div>

                </div>


                <label class="form-label">
                    Total Payable
                </label>

                <input
                    type="text"
                    class="form-control mb-3"
                    id="dueTotal"
                    readonly
                >


                <label class="form-label">
                    Paid Amount
                </label>

                <input
                    type="number"
                    class="form-control mb-3"
                    id="paidAmount"
                    oninput="calculateDue()"
                >


                <label class="form-label">
                    Due Amount
                </label>

                <input
                    type="text"
                    class="form-control mb-3"
                    id="dueAmount"
                    readonly
                >


                <label class="form-label">
                    Due Date
                </label>

                <input
                    type="date"
                    class="form-control"
                    id="dueDate"
                >

            </div>


            <div class="modal-footer">

                <button
                    class="btn btn-light modal-action"
                    data-bs-dismiss="modal"
                >
                    Close
                </button>

                <button
                    class="btn btn-primary modal-action"
                    data-bs-dismiss="modal"
                    onclick="saveDue()"
                >
                    <i class="bi bi-check-lg me-1"></i>
                    Save
                </button>

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
     CREATE PRODUCT MODAL
========================================================= --}}

<div
    class="modal animated zoomIn"
    id="createProductModal"
    tabindex="-1"
    aria-hidden="true"
>

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Create Product
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                ></button>

            </div>


            <div class="modal-body">

                <form id="save-product-form">

                    <div class="row">

                        {{-- Category --}}
                        <div class="col-md-6 mb-2">

                            <label class="form-label">
                                Category
                            </label>

                            <select
                                class="form-control form-select"
                                id="productCategory"
                            >

                                <option value="">
                                    Select Category
                                </option>

                            </select>

                        </div>


                        {{-- Sub Category --}}
                        <div class="col-md-6 mb-2">

                            <label class="form-label">
                                Sub Category
                            </label>

                            <select
                                class="form-control form-select"
                                id="productSubCategory"
                            >

                                <option value="">
                                    Select Sub Category
                                </option>

                            </select>

                        </div>


                        {{-- Product Name --}}
                        <div class="col-md-12 mb-2">

                            <label class="form-label">
                                Name
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="productName"
                            >

                        </div>


                        {{-- Quantity --}}
                        <div class="col-md-6 mb-2">

                            <label class="form-label">
                                Quantity
                            </label>

                            <input
                                type="number"
                                class="form-control"
                                id="productQuantity"
                            >

                        </div>


                        {{-- Buy Price --}}
                        <div class="col-md-6 mb-2">

                            <label class="form-label">
                                Buy Price
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="productBuyPrice"
                            >

                        </div>


                        {{-- Sell Price --}}
                        <div class="col-md-6 mb-2">

                            <label class="form-label">
                                Sell Price
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="productSellPrice"
                            >

                        </div>


                        {{-- Note --}}
                        <div class="col-md-6 mb-2">

                            <label class="form-label">
                                Note
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="productNote"
                            >

                        </div>


                        {{-- Image --}}
                        <div class="col-12 mt-2">

                            <label class="form-label">
                                Product Image
                            </label>

                            <div class="d-flex align-items-center gap-3">

                                <img
                                    id="newImg"
                                    src="{{ asset('images/default.jpg') }}"
                                    alt="Preview"
                                >

                                <input
                                    type="file"
                                    class="form-control"
                                    id="productImg"
                                    oninput="newImg.src=window.URL.createObjectURL(this.files[0])"
                                >

                            </div>

                        </div>

                    </div>

                </form>

            </div>


            <div class="modal-footer">

                <button
                    class="btn btn-light modal-action"
                    data-bs-dismiss="modal"
                >
                    Close
                </button>

                <button
                    onclick="SaveProduct()"
                    class="btn bg-gradient-success modal-action"
                >
                    <i class="bi bi-check-lg me-1"></i>
                    Save
                </button>

            </div>

        </div>

    </div>

</div>


<script>

    /* =========================================================
       INITIAL LOAD
    ========================================================= */

    (async ()=>{

        showLoader();

        await CustomerList();
        await ProductList();

        hideLoader();

    })()


    let InvoiceItemList=[];


    /* =========================================================
       INVOICE ITEMS
    ========================================================= */

    function ShowInvoiceItem() {

        let invoiceList=$('#invoiceList');

        invoiceList.empty();

        InvoiceItemList.forEach(function (item,index) {

            let row=`
                <tr class="text-xs">

                    <td>
                        <span class="fw-semibold">
                            ${item['product_name']}
                        </span>
                    </td>

                    <td>
                        ${item['qty']}
                    </td>

                    <td>
                        <span class="fw-semibold">
                            ৳ ${item['sale_price']}
                        </span>
                    </td>

                    <td>
                        <a
                            data-index="${index}"
                            class="btn remove text-xxs px-2 py-1 btn-sm m-0"
                        >
                            <i class="bi bi-trash3"></i>
                        </a>
                    </td>

                </tr>
            `

            invoiceList.append(row)

        })


        CalculateGrandTotal();


        $('.remove').on('click', async function () {

            let index= $(this).data('index');

            removeItem(index);

        })

    }


    function removeItem(index) {

        InvoiceItemList.splice(index,1);

        ShowInvoiceItem()

    }


    function DiscountChange() {

        CalculateGrandTotal();

    }


    /* =========================================================
       CALCULATE TOTAL
    ========================================================= */

    function CalculateGrandTotal(){

        let Total = 0;
        let Vat = 0;
        let Payable = 0;
        let Discount = 0;

        let vatPercentage =
            parseFloat(document.getElementById('vatP').value) || 0;

        let discountAmount =
            parseFloat(document.getElementById('discountP').value) || 0;


        InvoiceItemList.forEach((item)=>{

            Total += parseFloat(item['sale_price']);

        });


        let OriginalTotal = Total;


        if(discountAmount > OriginalTotal){

            discountAmount = OriginalTotal;

        }


        Discount = discountAmount;


        let afterDiscount =
            OriginalTotal - Discount;


        Vat =
            (afterDiscount * vatPercentage / 100);


        Payable =
            afterDiscount + Vat;


        Total = OriginalTotal.toFixed(2);

        Vat = Vat.toFixed(2);

        Discount = Discount.toFixed(2);

        Payable = Payable.toFixed(2);


        document.getElementById('total').innerText =
            Total;

        document.getElementById('vat').innerText =
            Vat;

        document.getElementById('discount').innerText =
            Discount;

        document.getElementById('payable').innerText =
            Payable;


        if (!window.invoiceDue) {

            document.getElementById('paidDisplay').innerText =
                Payable;

        }
        else {

            let oldPaid =
                parseFloat(window.invoiceDue.paid || 0);

            let oldDue =
                parseFloat(window.invoiceDue.due || 0);

            let oldTotal =
                oldPaid + oldDue;

            let newPaid =
                Payable;


            if (oldTotal > 0) {

                newPaid =
                    (Payable * oldPaid) / oldTotal;

            }


            document.getElementById('paidDisplay').innerText =
                parseFloat(newPaid).toFixed(2);

        }

    }


    /* =========================================================
       ADD MANUAL PRODUCT
    ========================================================= */

    function add() {

        let PId =
            document.getElementById('PId').value;

        let PName =
            document.getElementById('PName').value;

        let PPrice =
            document.getElementById('PPrice').value;

        let PQty =
            document.getElementById('PQty').value;


        let PTotalPrice =
            (parseFloat(PPrice)*parseFloat(PQty)).toFixed(2);


        if(PId.length===0){

            errorToast("Product ID Required");

        }

        else if(PName.length===0){

            errorToast("Product Name Required");

        }

        else if(PPrice.length===0){

            errorToast("Product Price Required");

        }

        else if(PQty.length===0){

            errorToast("Product Quantity Required");

        }

        else{

            let item={
                product_name:PName,
                product_id:PId,
                qty:PQty,
                sale_price:PTotalPrice
            };


            InvoiceItemList.push(item);


            $('#create-modal').modal('hide');


            ShowInvoiceItem();

        }

    }


    function addModal(id,name,price) {

        document.getElementById('PId').value=id;

        document.getElementById('PName').value=name;

        document.getElementById('PPrice').value=price;

        document.getElementById('PQty').value="";


        $('#create-modal').modal('show');

    }


    /* =========================================================
       CUSTOMER LIST
    ========================================================= */

    async function CustomerList(){

        let res =
            await axios.get("/list-customer");


        let customerList =
            $("#customerList");

        let customerTable =
            $("#customerTable");


        customerTable.DataTable().destroy();

        customerList.empty();


        res.data.sort((a,b)=> b.id - a.id);


        res.data.forEach(function(item,index){

            let row=`

                <tr class="text-xs">

                    <td>

                        <div class="d-flex align-items-center">

                            <i class="bi bi-person-circle me-2 text-secondary"></i>

                            <span>
                                ${item['name']}
                            </span>

                        </div>

                    </td>

                    <td>

                        <a
                            data-name="${item['name']}"
                            data-mobile="${item['mobile']}"
                            data-id="${item['id']}"
                            class="btn btn-outline-dark addCustomer pick-btn"
                        >
                            Select
                        </a>

                    </td>

                </tr>

            `;

            customerList.append(row);

        });


        $('.addCustomer').on('click', function () {

            let CName =
                $(this).data('name');

            let CMobile =
                $(this).data('mobile');

            let CId =
                $(this).data('id');


            $("#CName").text(CName);

            $("#CMobile").text(CMobile);

            $("#CId").text(CId);

        });


        new DataTable('#customerTable',{

            ordering: false,

            scrollCollapse: false,

            info: false,

            lengthChange: false

        });

    }


    /* =========================================================
       SAVE CUSTOMER
    ========================================================= */

    async function SaveCustomer() {

        let name =
            document.getElementById('customerName').value;

        let email =
            document.getElementById('customerEmail').value;

        let mobile =
            document.getElementById('customerMobile').value;


        if (!name || !email || !mobile)

            return errorToast("All fields required!");


        document
            .getElementById('modal-close-customer')
            .click();


        showLoader();


        try {

            let res =
                await axios.post(
                    "/create-customer",
                    {
                        name,
                        email,
                        mobile
                    }
                );


            hideLoader();


            if(res.status === 200){

                successToast("Customer Created!");


                document
                    .getElementById("createCustomerForm")
                    .reset();


                let row = `

                    <tr class="text-xs">

                        <td>

                            <div class="d-flex align-items-center">

                                <i class="bi bi-person-circle me-2 text-secondary"></i>

                                ${res.data.name}

                            </div>

                        </td>

                        <td>

                            <a
                                data-name="${res.data.name}"
                                data-mobile="${res.data.mobile}"
                                data-id="${res.data.id}"
                                class="btn btn-outline-dark addCustomer pick-btn"
                            >
                                Select
                            </a>

                        </td>

                    </tr>

                `;


                $('#customerList').prepend(row);


                $('.addCustomer')
                    .off('click')
                    .on('click', function(){

                        let CName =
                            $(this).data('name');

                        let CMobile =
                            $(this).data('mobile');

                        let CId =
                            $(this).data('id');


                        $("#CName").text(CName);

                        $("#CMobile").text(CMobile);

                        $("#CId").text(CId);

                    });

            }

            else{

                errorToast("Request failed!");

            }

        }

        catch (err) {

            hideLoader();

            errorToast("Something went wrong!");

        }

    }


    /* =========================================================
       PRODUCT LIST
    ========================================================= */

    async function ProductList(){

        let res =
            await axios.get("/list-product");


        let productList =
            $("#productList");

        let productTable =
            $("#productTable");


        productTable.DataTable().destroy();

        productList.empty();


        res.data.forEach(function (item,index) {

            let row=`

                <tr class="text-xs">

                    <td>

                        <div class="d-flex align-items-center">

                            <img
                                class="product-image"
                                src="${item['img_url']}"
                                alt=""
                            >

                            <div>

                                <div class="fw-semibold">
                                    ${item['name']}
                                </div>

                                <div class="text-muted">
                                    ৳ ${item['sell_price']}
                                </div>

                            </div>

                        </div>

                    </td>

                    <td>

                        <a
                            data-name="${item['name']}"
                            data-price="${item['sell_price']}"
                            data-id="${item['id']}"
                            class="btn btn-outline-dark text-xxs addProduct pick-btn"
                        >
                            Add
                        </a>

                    </td>

                </tr>

            `;

            productList.append(row);

        });


        $('.addProduct').on('click', async function () {

            let PName =
                $(this).data('name');

            let PPrice =
                $(this).data('price');

            let PId =
                $(this).data('id');


            addModal(
                PId,
                PName,
                PPrice
            );

        });


        new DataTable('#productTable',{

            ordering: false,

            scrollCollapse: false,

            info: false,

            lengthChange: false

        });

    }


    /* =========================================================
       CREATE INVOICE
    ========================================================= */

    async function createInvoice() {


        const confirm =
            await Swal.fire({

                title: "Save Invoice?",

                text: "Are you sure you want to save this invoice?",

                icon: "question",

                width: "350px",

                showCancelButton: true,

                confirmButtonText: "Yes, Save",

                cancelButtonText: "No",

                confirmButtonColor: "#0d6efd"

            });


        if(!confirm.isConfirmed){

            return;

        }


        let total =
            document.getElementById('total').innerText;

        let discount =
            document.getElementById('discount').innerText;

        let vat =
            document.getElementById('vat').innerText;

        let payable =
            document.getElementById('payable').innerText;


        let CId =
            document.getElementById('CId').innerText;

        let CName =
            document.getElementById('CName').innerText;

        let CMobile =
            document.getElementById('CMobile').innerText;


        let finalPaid,
            finalDue;


        if (!window.invoiceDue) {

            finalPaid = payable;

            finalDue = 0;

        }

        else {

            finalPaid =
                window.invoiceDue.paid;

            finalDue =
                window.invoiceDue.due;

        }


        let Data = {

            total: total,

            discount: discount,

            vat: vat,

            payable: payable,

            customer_id: CId,

            customer_name: CName,

            customer_mobile: CMobile,

            paid: finalPaid,

            due: finalDue,

            due_date:
                window.invoiceDue?.dueDate || null,

            items:
                InvoiceItemList

        };


        if(CId.length===0){

            errorToast("Customer Required !");

        }

        else if(InvoiceItemList.length===0){

            errorToast("Product Required !");

        }

        else{

            showLoader();


            let res =
                await axios.post(
                    "/invoice-create",
                    Data
                );


            hideLoader();


            if(res.data.status === true){

                successToast("Invoice Created");


                InvoiceItemList = [];

                ShowInvoiceItem();


                $("#CName")
                    .text("Walk-in Customer");

                $("#CMobile")
                    .text("—");

                $("#CId")
                    .text("—");


                $("#total")
                    .text("0.00");

                $("#vat")
                    .text("0.00");

                $("#discount")
                    .text("0.00");

                $("#payable")
                    .text("0.00");

                $("#paidDisplay")
                    .text("0.00");


                $("#discountP")
                    .val(0);

                $("#vatP")
                    .val("");


                $("#PQty")
                    .val("");


                window.invoiceDue = null;


                $("#dueTotal")
                    .val("");

                $("#paidAmount")
                    .val("");

                $("#dueAmount")
                    .val("");

                $("#dueDate")
                    .val("");


                window.scrollTo({

                    top: 0,

                    behavior: "smooth"

                });

            }

            else{

                errorToast(
                    res.data.error ||
                    "Something Went Wrong"
                );

            }

        }

    }


    /* =========================================================
       CUSTOMER MODAL
    ========================================================= */

    function OpenCustomerModal(){

        $('#createCustomerModal')
            .modal('show');

    }


    /* =========================================================
       DUE SYSTEM
    ========================================================= */

    function openDueModal() {

        let total =
            document.getElementById("payable").innerText;


        document.getElementById("dueTotal").value =
            total;


        document.getElementById("dueTotalPreview").innerText =
            total;


        if (window.invoiceDue) {

            document.getElementById("paidAmount").value =
                window.invoiceDue.paid ?? "";

            document.getElementById("dueAmount").value =
                window.invoiceDue.due ?? "";

            document.getElementById("dueDate").value =
                window.invoiceDue.dueDate ?? "";

        }

        else {

            document.getElementById("paidAmount").value =
                "";

            document.getElementById("dueAmount").value =
                "";

            document.getElementById("dueDate").value =
                "";

        }


        $('#dueModal').modal('show');

    }


    function calculateDue() {

        let total =
            parseFloat(
                document.getElementById("dueTotal").value || 0
            );


        let paid =
            parseFloat(
                document.getElementById("paidAmount").value || 0
            );


        let due =
            total - paid;


        if (due < 0)

            due = 0;


        document.getElementById("dueAmount").value =
            due.toFixed(2);

    }


    function resetDue() {

        document.getElementById("paidAmount").value =
            "";

        document.getElementById("dueAmount").value =
            "";

        document.getElementById("dueDate").value =
            "";

    }


    function saveDue() {

        let paidInput =
            document.getElementById("paidAmount").value;


        if (paidInput === "") {

            window.invoiceDue = null;


            document.getElementById("paidDisplay").innerText =
                document.getElementById("payable").innerText;


            return;

        }


        let paid =
            parseFloat(paidInput);


        let total =
            parseFloat(
                document.getElementById("dueTotal").value
            );


        let due =
            total - paid;


        if (due < 0)

            due = 0;


        window.invoiceDue = {

            paid: paid,

            due: due,

            dueDate:
                document.getElementById("dueDate").value

        };


        document.getElementById("paidDisplay").innerText =
            parseFloat(paid).toFixed(2);

    }


    /* =========================================================
       PRODUCT
    ========================================================= */

    function OpenProductModal(){

        $('#createProductModal')
            .modal('show');

    }


    /* =========================================================
       CATEGORY
    ========================================================= */

    FillCategoryDropDown();


    async function FillCategoryDropDown(){

        let res =
            await axios.get("/list-category");


        let categorySelect =
            document.getElementById('productCategory');


        categorySelect.innerHTML =
            `<option value="">Select Category</option>`;


        res.data.forEach(function(item){

            categorySelect.innerHTML += `

                <option value="${item.id}">
                    ${item.name}
                </option>

            `;

        });


        window.categoryData =
            res.data;

    }


    /* =========================================================
       SUBCATEGORY
    ========================================================= */

    document
        .getElementById('productCategory')
        .addEventListener('change', function () {


            let categoryId =
                this.value;


            let subSelect =
                document.getElementById(
                    'productSubCategory'
                );


            subSelect.innerHTML =
                `<option value="">Select Sub Category</option>`;


            let selectedCategory =
                window.categoryData.find(
                    c => c.id == categoryId
                );


            if(
                selectedCategory &&
                selectedCategory.sub_categories.length > 0
            ){

                selectedCategory.sub_categories
                    .forEach(function(sub){

                        subSelect.innerHTML += `

                            <option value="${sub.id}">
                                ${sub.name}
                            </option>

                        `;

                    });

            }

        });


    /* =========================================================
       SAVE PRODUCT
    ========================================================= */

    async function SaveProduct(){

        let productCategory =
            document.getElementById(
                'productCategory'
            ).value;


        let productSubCategory =
            document.getElementById(
                'productSubCategory'
            ).value;


        let productName =
            document.getElementById(
                'productName'
            ).value;


        let productQuantity =
            document.getElementById(
                'productQuantity'
            ).value;


        let productBuyPrice =
            document.getElementById(
                'productBuyPrice'
            ).value;


        let productSellPrice =
            document.getElementById(
                'productSellPrice'
            ).value;


        let productNote =
            document.getElementById(
                'productNote'
            ).value;


        let productImg =
            document.getElementById(
                'productImg'
            ).files[0];


        if(productCategory.length === 0){

            errorToast("Category Required");

        }

        else if(productName.length === 0){

            errorToast("Product Name Required");

        }

        else if(productQuantity.length === 0){

            errorToast("Quantity Required");

        }

        else if(productBuyPrice.length === 0){

            errorToast("Buy Price Required");

        }

        else if(productSellPrice.length === 0){

            errorToast("Sell Price Required");

        }

        else{

            let formData =
                new FormData();


            if(productImg){

                formData.append(
                    'img',
                    productImg
                );

            }


            formData.append(
                'name',
                productName
            );

            formData.append(
                'quantity',
                productQuantity
            );

            formData.append(
                'buy_price',
                productBuyPrice
            );

            formData.append(
                'sell_price',
                productSellPrice
            );

            formData.append(
                'note',
                productNote
            );

            formData.append(
                'category_id',
                productCategory
            );

            formData.append(
                'subcategory_id',
                productSubCategory
            );


            const config = {

                headers:{

                    'content-type':
                        'multipart/form-data'

                }

            };


            showLoader();


            try{

                let res =
                    await axios.post(
                        "/create-product",
                        formData,
                        config
                    );


                hideLoader();


                if(res.status === 201){

                    successToast(
                        "Product Added Successfully"
                    );


                    $('#createProductModal')
                        .modal('hide');


                    document
                        .getElementById(
                            "save-product-form"
                        )
                        .reset();


                    document
                        .getElementById(
                            'newImg'
                        )
                        .src =
                        "{{asset('images/default.jpg')}}";


                    await ProductList();

                }

                else{

                    errorToast(
                        "Request Failed"
                    );

                }

            }

            catch(e){

                hideLoader();

                errorToast(
                    "Something Went Wrong"
                );

            }

        }

    }

</script>

@endsection
