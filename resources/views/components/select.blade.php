<!-- component -->
<div>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <label class="block text-sm font-medium text-white">{{ $label }}</label>
    <select
        class="px-5 py-3 border border-lime-400 w-80 mt-1 block bg-white rounded-md shadow-sm focus:outline-none focus:ring-lime-500 focus:border-lime-500"
        name="{{ $name }}"
        {{-- id="{{ $id }}"  --}}
        @change="changeCategory"
    >
        <option value="">{{ $valor }}</option>
    </select>
</div>


<script>
  const arraydata = [{
      id: "1",
      name: "AAA-LKR1000",
      vehicle_category_id: "1"
    },
    {
      id: "2",
      name: "BBB-LKR2500",
      vehicle_category_id: "1"
    },
    {
      id: "3",
      name: "CCC-LKR1000",
      vehicle_category_id: "2"
    },
    {
      id: "4",
      name: "DDD-LKR2500",
      vehicle_category_id: "2"
    }
  ];

  function packageList() {
    return {
      id: "",
      name: "",
      datas: arraydata,
      changeCategory() {
        var e = document.getElementById("vehicle_id");
        var value = e.options[e.selectedIndex].getAttribute("data-val");
        this.datas = arraydata.filter((i) => {
          return i.vehicle_category_id == value;
        })
      }
    };
  }
</script>
