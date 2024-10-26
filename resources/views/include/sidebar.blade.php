<style>
    .active {
        background: rgb(255 228 205);
    }
</style>
<div id="sidebar"
    class="sidebar bg-white overflow-auto fixed top-0 left-0 z-40 w-[290px] h-screen transition-transform -translate-x-full xl:translate-x-0 flex flex-col py-[10px]  border-r border-[#DFEAF0] ">
    <div id="close-button" class="flex justify-end px-[20px] xl:hidden lg:flex md:flex ">
        <i class="fa-solid fa-xmark"></i>
    </div>
    <div class="py-[1rem] flex justify-center">
        <img src="{{ asset('admin-assets//images/nanpa.svg') }}" style="width: 80%;" />
    </div>
    <div class="">
        <div class="flex flex-col gap-[10px] border-b px-[20px] border-[#B1B6C6]  overflow-hidden pb-[40px] ">
            <div class="">
                <a href="{{ route('admin.dashboard') }}"
                    class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }} flex items-center p-2 text-base text-gray-900 transition duration-75  w-[260px] h-[50px] rounded-[10px]   hover:bg-[#FFE4CD] "
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <img src="{{ asset('admin-assets//images/Dashboard.png') }}" class="pl-[10px]">
                    <span
                        class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap font-semibold text-[15px] leading-[18px] text-[#000000]">Dashboard</span>

                </a>
            </div>

            <div class="">
                <a href="{{route('user.list')}}" class="{{ request()->routeIs(['user.list','user.view','user.status.change']) ? 'active' : '' }} flex items-center p-2 text-base text-gray-900 transition duration-75  w-[260px] h-[50px] rounded-[10px]   hover:bg-[#FFE4CD] " aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <img src="{{asset('admin-assets//images/cerificate.png')}}" class="pl-[10px]">
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap font-semibold text-[15px] leading-[18px] text-[#000000]">User Management</span>
                </a>
            </div>

            <div class="">
                <a href="{{ route('my.property.list') }}"
                    class="{{ request()->routeIs(['my.property.list', 'property.status.change', 'property.view']) ? 'active' : '' }} flex items-center p-2 text-base text-gray-900 transition duration-75  w-[260px] h-[50px] rounded-[10px]   hover:bg-[#FFE4CD] "
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <img src="{{ asset('admin-assets//images/buildings.png') }}" class="pl-[10px]">
                    <span
                        class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap font-semibold text-[15px] leading-[18px] text-[#000000]">Property
                        Tax Asset</span>

                </a>
            </div>
            <div class="">
                <a href="{{ route('birth.certificate') }}"
                    class="{{ request()->routeIs(['birth.certificate', 'birth.status.change', 'birth.certificate.list', 'birth.certificate.view', 'birth.certificate.pay.slip']) ? 'active' : '' }} flex items-center p-2 text-base text-gray-900 transition duration-75  w-[260px] h-[50px] rounded-[10px]   hover:bg-[#FFE4CD] "
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <img src="{{ asset('admin-assets//images/cerificate.png') }}" class="pl-[10px]">
                    <span
                        class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap font-semibold text-[15px] leading-[18px] text-[#000000]">Birth
                        certificate</span>
                </a>
            </div>
            <div class="">
                <a href="{{ route('death.certificate.list') }}"
                    class="{{ request()->routeIs(['death.certificate.list', 'death.certificate.view', 'death.certificate.pdf', 'death.status.change', 'death.certificate.pay.slip']) ? 'active' : '' }} flex items-center p-2 text-base text-gray-900 transition duration-75  w-[260px] h-[50px] rounded-[10px]   hover:bg-[#FFE4CD] "
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <img src="{{ asset('admin-assets//images/cerificate.png') }}" class="pl-[10px]">
                    <span
                        class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap font-semibold text-[15px] leading-[18px] text-[#000000]">Death
                        certificate</span>


                </a>
            </div>
            <div class="">
                <a href="{{ route('marriage.certificate.list') }}"
                    class="{{ request()->routeIs(['marriage.certificate.list', 'marriage.certificate.view', 'marriage.certificate.gernatepdf', 'status.change', 'marriage.certificate.pay.slip']) ? 'active' : '' }} flex items-center p-2 text-base text-gray-900 transition duration-75  w-[260px] h-[50px] rounded-[10px]   hover:bg-[#FFE4CD] "
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <img src="{{ asset('admin-assets//images/cerificate.png') }}" class="pl-[10px]">
                    <span
                        class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap font-semibold text-[15px] leading-[18px] text-[#000000]">Marriage
                        Certificates</span>
                </a>
            </div>
            <div class="">
                <a href="{{ route('admin.billGeneration') }}"
                    class="{{ request()->routeIs(['admin.billGeneration','admin.propertyTaxBill','admin.propertyTaxBillView','admin.birthBill','admin.birthBillView','admin.deathBill','admin.deathBillView','admin.tradeLicenseBill','admin.marriageBill','admin.marriageBillView','admin.tradeLicenseBillView','admin.wastageBill','admin.wastageBillView','admin.waterBill','admin.waterBillView']) ? 'active' : '' }} flex items-center p-2 text-base text-gray-900 transition duration-75  w-[260px] h-[50px] rounded-[10px]   hover:bg-[#FFE4CD] "
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <img src="{{ asset('admin-assets//images/cerificate.png') }}" class="pl-[10px]">
                    <span
                        class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap font-semibold text-[15px] leading-[18px] text-[#000000]">
                        Bill Generation</span>
                </a>
            </div>
            <div class="">
                <a href="{{ route('trade.license.list') }}"
                    class="{{ request()->routeIs(['trade.license.list', 'trade.license.view', 'trade.license.gernatepdf', 'trade.status.change', 'upload.pay.slip']) ? 'active' : '' }} flex items-center p-2 text-base text-gray-900 transition duration-75  w-[260px] h-[50px] rounded-[10px]   hover:bg-[#FFE4CD] "
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <img src="{{ asset('admin-assets//images/personalcard.png') }}" class="pl-[10px]">
                    <span
                        class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap font-semibold text-[15px] leading-[18px] text-[#000000]">Trade
                        License Management </span>
                </a>
            </div>
            <div class="">
                <a href="{{ route('trade.tradeListing') }}"
                    class="{{ request()->routeIs(['trade.tradeListing','trade.tradeListingEdit','trade.tradeListingStore']) ? 'active' : '' }} flex items-center p-2 text-base text-gray-900 transition duration-75  w-[260px] h-[50px] rounded-[10px]   hover:bg-[#FFE4CD] "
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <img src="{{ asset('admin-assets//images/personalcard.png') }}" class="pl-[10px]">
                    <span
                        class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap font-semibold text-[15px] leading-[18px] text-[#000000]">
                        Trade License Listing</span>
                </a>
            </div>
            <div class="">
                <a href="{{ route('trade.category.list') }}"
                    class="{{ request()->routeIs(['trade.category.list', 'trade.category.add', 'trade.category.save', 'trade.category.delete']) ? 'active' : '' }} flex items-center p-2 text-base text-gray-900 transition duration-75  w-[260px] h-[50px] rounded-[10px]   hover:bg-[#FFE4CD] "
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <img src="{{ asset('admin-assets//images/personalcard.png') }}" class="pl-[10px]">
                    <span
                        class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap font-semibold text-[15px] leading-[18px] text-[#000000]">Trade
                        License Category </span>
                </a>
            </div>
            <div class="">
                <a href="{{ route('trade.subcategory.list') }}"
                    class="{{ request()->routeIs(['trade.subcategory.list', 'trade.subcategory.add', 'trade.subcategory.save', 'trade.subcategory.delete']) ? 'active' : '' }} flex items-center p-2 text-base text-gray-900 transition duration-75  w-[260px] h-[50px] rounded-[10px]   hover:bg-[#FFE4CD] "
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <img src="{{ asset('admin-assets//images/personalcard.png') }}" class="pl-[10px]">
                    <span
                        class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap font-semibold text-[15px] leading-[18px] text-[#000000]">Trade
                        License Sub Category </span>
                </a>
            </div>
            <div class="">
                <a href="{{ route('wastage.collection') }}"
                    class="{{ request()->routeIs(['wastage.collection','WastageView']) ? 'active' : '' }} flex items-center p-2 text-base text-gray-900 transition duration-75  w-[260px] h-[50px] rounded-[10px]   hover:bg-[#FFE4CD] "
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <img src="{{ asset('admin-assets//images/personalcard.png') }}" class="pl-[10px]">
                    <span
                        class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap font-semibold text-[15px] leading-[18px] text-[#000000]">Wastage
                        Collection</span>
                </a>
            </div>
            <div class="">
                <a href="{{ route('water.tax') }}"
                    class="{{ request()->routeIs(['water.tax','waterView']) ? 'active' : '' }} flex items-center p-2 text-base text-gray-900 transition duration-75  w-[260px] h-[50px] rounded-[10px]   hover:bg-[#FFE4CD] "
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <img src="{{ asset('admin-assets//images/personalcard.png') }}" class="pl-[10px]">
                    <span
                        class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap font-semibold text-[15px] leading-[18px] text-[#000000]">Water
                        Tax</span>
                </a>
            </div>
            <div class="">
                <a href="{{ route('admin.homeAdvertisement') }}"
                    class="{{ request()->routeIs(['admin.homeAdvertisement','admin.advertisementList','admin.addAdvertisement','admin.storeAdvertisement']) ? 'active' : '' }} flex items-center p-2 text-base text-gray-900 transition duration-75  w-[260px] h-[50px] rounded-[10px]   hover:bg-[#FFE4CD] "
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <img src="{{ asset('admin-assets//images/personalcard.png') }}" class="pl-[10px]">
                    <span
                        class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap font-semibold text-[15px] leading-[18px] text-[#000000]">
                        Advertisements</span>
                </a>
            </div>
            <div class="">
                <a href="{{ route('complains') }}"
                    class="{{ request()->routeIs(['complains', 'complains.view', 'complain.status.change', 'complains.chat', 'complains.message']) ? 'active' : '' }} flex items-center p-2 text-base text-gray-900 transition duration-75  w-[260px] h-[50px] rounded-[10px]   hover:bg-[#FFE4CD] "
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <img src="{{ asset('admin-assets//images/comments.png') }}" class="pl-[10px]">
                    <span
                        class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap font-semibold text-[15px] leading-[18px] text-[#000000]">Complains</span>

                </a>
            </div>
        </div>
        <div class="flex flex-col gap-10px px-[24px] py-[10px] ">
            <div class="">
                <a href="{{ route('profile.details') }}"
                    class="{{ request()->routeIs(['profile.details', 'profile.update']) ? 'active' : '' }} flex items-center p-2 text-base text-gray-900 transition duration-75  w-[260px] h-[50px] rounded-[10px]   hover:bg-[#FFE4CD] "
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <img src="{{ asset('admin-assets//images/setting.png') }}" class="pl-[10px]">
                    <span
                        class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap font-semibold text-[15px] leading-[18px] text-[#000000]">Settings</span>
                </a>
            </div>
        </div>
    </div>
</div>
