<template>
<div>
     <input type="text" class="form-control" name="care_item4" id="care_item4" placeholder="使っているケア用品を入力してください" list="forth_careitem">
     <datalist id="forth_careitem">
          <option v-for="forth_care_item in forth_care_items" :value="forth_care_item.care_item4"></option>
     </datalist>
</div>
</template>

<script>
export default {
     props: ["forth_care_items"]
}
</script>
