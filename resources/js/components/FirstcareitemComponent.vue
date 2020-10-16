<template>
<div>
     <input type="text" class="form-control" name="care_item1" id="care_item1" placeholder="使っているケア用品を入力してください" list="first_careitem">
     <datalist id="first_careitem">
          <option v-for="first_care_item in first_care_items" :value="first_care_item.care_item1"></option>
     </datalist>
</div>
</template>

<script>
export default {
     props: ["first_care_items"]
}
</script>
