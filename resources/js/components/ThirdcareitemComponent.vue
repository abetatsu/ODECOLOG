<template>
<div>
     <input type="text" class="form-control" name="care_item3" id="care_item3" placeholder="使っているケア用品を入力してください" list="third_careitem">
     <datalist id="third_careitem">
          <option v-for="third_care_item in third_care_items" :value="third_care_item.care_item3"></option>
     </datalist>
</div>
</template>

<script>
export default {
     props: ["third_care_items"]
}
</script>
