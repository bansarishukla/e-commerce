<template>
  <ul>
    <li v-for="(product,index) in list" :key="index">
      {{ formData.name }}
  </ul>
</template>
<script>
export default {
  props:{
    postData: {
      type:Array,
      required:true
    }
  },
  data() {
    return {
      list: []
    }
  },
  mounted() {
    this.list = this.postData
  },
  methods: {
    async fetchData()
    {
      let res = await axios.get('/product')
      if(res.data)
      {
        this.list = res.data.product
      }
    }
  }
};
</script>
