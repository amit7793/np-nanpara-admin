@extends('include.main')
@section('content')
<div class="xl:px-[4rem] px-[20px] py-[3rem]">
    <h2 class=" font-bold text-[24px] leading-[30px] lg:text-[32px] lg:leading-[40px] text-[#000000]">Complain Application</h2>
    <div>
    <form action="{{route('complains.save')}}" method="post" id="myForm">
    @csrf
        <div class="border border-[#B1B6C6] rounded-[20px] mt-10 pb-[20px] ">
            <h3 class=" font-semibold text-[18px] leading-[30px]   lg:px-[20px] px-[10px]   py-[20px] text-[#000000]">Details</h3>
            <div class="border-b border-[#B1B6C6] pb-[40px]">
            <div class="lg:grid lg:grid-cols-3 md:grid md:grid-cols-2  lg:gap-10  mt-5   px-[10px] lg:px-[20px]   pb-[30px] flex flex-col gap-5">

                <div>
                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">Name<span class="text-red-600">*</span></div>
                    <input type="text" id="name" name="name" class="    w-full border border-[#B1B6C6] pl-[19px]  rounded-[100px] h-[60px]" placeholder="Select Date">
                </div>
                <div>
                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">Mobile Number<span class="text-red-600">*</span></div>
                    <input type="text" id="mobile_number" name="mobile_number" class="    w-full border border-[#B1B6C6] pl-[19px]  rounded-[100px] h-[60px]" placeholder="Enter">
                </div>
                <div>
                    <div class="font-normal text-[15px] leading-[30px] text-[#000000] pb-[10px]">Email id</div>
                    <input type="text" id="email_id" name="email_id" class="    w-full border border-[#B1B6C6] pl-[19px]  rounded-[100px] h-[60px]" placeholder="Enter">
                </div>


            </div>
            <div class ="px-[20px]">
                    <div class="font-normal text-[15px] leading-[30px]  text-[#000000] pb-[10px]">Complain<span class="text-red-600">*</span></div>
                   <textarea name="complain" class=" w-full border outline-none border-[#B1B6C6] p-[19px]  rounded-[30px] h-[200px]" placeholder="write Here">

                   </textarea>
                </div>
</div>
            <div class="lg:flex lg:flex-row md:flex md:flex-row flex flex-col items-center justify-center mt-5 gap-5">
                <button id="resetButton" class="w-[250px] h-[70px] text-center rounded-[100px] border border-[#B1B6C6] text-black font-semibold text-[18px] leading-[30px]">
                    Reset
                 </button>
                <button type="submit" class="w-[250px] h-[70px] text-center rounded-[100px] bg-[#F26F00] text-[#FFFFFF] font-semibold text-[18px] leading-[30px]">Submit→</button>
           </div>
       </div>
    </form>
    </div>
</div>
<div id="successModal" class="fixed inset-0 z-50 top-[-32px] flex items-center justify-center bg-black bg-opacity-50  px-[10px] hidden">
            <div  class=" lg:w-[770px] w-full bg-[#FFFFFF] rounded-[20px] px-[10px] lg:px-[40px] pb-[40px] mt-[30px] md:max-h-full lg:max-h-full max-h-[400px] overflow-scroll">
                <div class="flex justify-center my-6">
                    <img src="{{ asset('admin-assets/images/success.png') }}">
                </div>
                <h5 class=" font-semibold text-[22px] lg:text-[28px] text-center  leading-[40px] pt-10">Mutation Application Submitted Successfully</h5>
                <p class=" font-normal text-[20px] leading-[28px] text-center mt-5 px-[20px] text-[#B9B9B9]">Lorem ipsum dolor sit amet consectetur. Tellus dui quam nunc id ipsum consectetur dictum pulvinar id.</p>

                <div class="flex justify-center flex-col items-center">
                <div class="lg:flex md:flex items-center  gap-5 mt-10">
                    <div class="font-bold text-[20px] leading-[30px] text-center">Application No.</div>
                    <p  class=" font-semibold text-[20px] leading-[20px] text-[#B9B9B9]  text-center  lg:mt-0 md:mt-0 mt-5">PG-AC-1234567890</p>
                </div>

            </div>
        </div>
        <script>
        document.addEventListener('DOMContentLoaded', () => {
            const resetButton = document.getElementById('resetButton');
            const form = document.getElementById('myForm');

            resetButton.addEventListener('click', (event) => {
                event.preventDefault();
                form.reset();
            });
        });
    </script>
<script>

    function openModal() {
        document.getElementById('successModal').classList.remove('hidden');
    }


    var modal = document.getElementById('successModal');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    document.getElementById('successModal').classList.add('hidden');
  }
}
</script>
@if (session('success'))
        <script>
          openModal()
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                title: 'Error!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
@endsection

