<template>
  <div class="main">
    <!-- <div class="title">
      <p>Add product</p>
    </div> -->
    <div class="content">
      <form @submit.prevent="createProduct()">
        <div class="form-group row">
          <label>Product Name</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" v-model="formData.name">
          </div>
        </div>
        <div class="form-group row">
          <label>Image</label>
          <div class="col-md-2">
            <img :src="formData.image" class="img-responsive">
          </div>
          <div class="col-md-8">
            <input type="file" ref="file" @change="onFileChange" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label>Category</label>
          {{ selectedCategories }}
          <select v-model="selectedCategories" multiple>
            <option v-for="(category,index) in categoryList"
                :key="index"
                :value="category.id">
                {{ category.name }}
              </option>
          </select>
        </div>
        <div class="form-group row">
          <label>Description</label>
          <div class="col-sm-8">
            <textarea rows="4" class="form-control" v-model="formData.description"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label>Full-Description</label>
          <div class="col-sm-8">
            <textarea rows="8" class="form-control" v-model="formData.full_description"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label>Price</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" v-model="formData.price">
          </div>
        </div>
        <div style="text-align: center">
          <button data-inline="true" type="submit" class="btn btn-primary" >Add category</button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    postData: {
      type: Array,
      required: true
    },
  },
  data() {
    return {
      list: [],
      selectedCategories: [],
      categoryList: [],
      formData: {
        name: '',
        image: '',
        description: '',
        full_description: '',
        price: '',
        // action: ''
      },
    };
  },
  mounted() {
    console.log('mounted');
    if(this.postData)
    {
      this.list = this.postData
    }
    this.fetchCategory()
  },
  methods: {
    onFileChange(e) {
      this.formData.image = this.$refs.file.files[0];
    },
    createImage(file) {
      let reader = new FileReader();
      let vm = this;
      reader.onload = (e) => {
          vm.formData.image = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    async createProduct()
    {
      let data = {
        name: this.formData.name,
        image: this.formData.image,
        categories: this.selectedCategories,
        description: this.formData.description,
        full_description: this.formData.full_description,
        price: this.formData.price,
        // action: this.formData.action
      }
      console.log(data);
      let formData = new FormData();
      formData.append('name', data.name);
      formData.append('image', data.image);
      formData.append('categories', JSON.stringify(data.categories));
      formData.append('description', data.description);
      formData.append('full_description', data.full_description);
      formData.append('price', data.price);


      axios.post('/product', formData, {
               headers: {
                   'Content-Type': 'multipart/form-data'
               }
             })
        .then((res) => {
          this.formData.name = '';
          this.formData.image = '';
          this.formData.categoryList = '';
          this.formData.description = '';
          this.formData.full_description = '';
          this.formData.price = '';
          // this.formData.action = '';
          this.list.push(res.data.formData)
        })
        .catch((err) => console.error(err));
      },
      async fetchCategory()
      {
        let res = await axios.get('/category')
        if(res.data)
        {
          this.categoryList = res.data.categories
        }
      },
  }
};
</script>
<style>
  .content {
    margin:0 0 0 50px;
  }
  .main {
    display: row;
  }
</style>
