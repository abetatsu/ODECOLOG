<template>
<div>
     <input type="text" class="form-control" name="care_item2" id="care_item2" placeholder="使っているケア用品を入力してください" list="second_careitem">
     <datalist id="second_careitem">
          <option v-for="second_care_item in second_care_items" :value="second_care_item.care_item2"></option>
     </datalist>
</div>
</template>

<script>
export default {
     props: ["second_care_items"]
}
</script>
