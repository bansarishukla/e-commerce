<template>
  <div class="card">
    <div class="card-header">
      Edit Product
    </div>
    <div class="card-body">
      <form @submit.prevent="updateProduct">
        <div class="form-group row">
          <label for="inputName" class="col-sm-1 col-form-label">Name</label>
          <div class="col-sm-8">
            <input v-model="formData.name" type="text" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputImage" class="col-sm-1 col-form-label">Selected Image</label>
          <div class="col-sm-8">
            <img :src="formData.image" height="50px" width="50px" alt="image"/>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputImage1" class="col-sm-1 col-form-label">Choose Image</label>
          <div class="col-sm-8">
            <input type="file" ref="file" @change="onFileChange" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputDescription" class="col-sm-1 col-form-label">Description</label>
          <div class="col-sm-8">
            <textarea rows="4" class="form-control" v-model="formData.description"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputFullDescription" class="col-sm-1 col-form-label">Full-Description</label>
          <div class="col-sm-8">
            <textarea rows="8" class="form-control" v-model="formData.full_description"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPrice" class="col-sm-1 col-form-label">Price</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" v-model="formData.price">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputQuantity" class="col-sm-1 col-form-label">quantity</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" v-model="formData.quantity">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputSelectCat" class="col-sm-1 col-form-label">Select Category</label>
          {{ selectedCategories }}
          <select v-model="selectedCategories" multiple>
            <option v-for="(category,index) in categoryList"
              :key="index"
              :value="category.id">
              {{ category.name }}
            </option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>
</template>
<script>
export default {
  props:{
    editData: {
      type: Object,
      required: true
    }
   },
  data()
  {
    return {
      list:[],
      categoryList: [],
      selectedCategories: [],
      formData: {
        name:'',
        image: '',
        description: '',
        full_description: '',
        price: '',
        quantity: ''
      }
    }
  },
  mounted()
  {
    if(this.editData)
    {
      this.formData.name = this.editData.name;
      this.formData.image = this.editData.image;
      this.formData.description = this.editData.description;
      this.formData.full_description = this.editData.full_description;
      this.formData.price = this.editData.price;
      this.formData.quantity = this.editData.quantity;
      this.formData.categories = this.editData.categories;
      this.selectedCategories = [ ...this.editData.categories.map((categories) => categories.id)]
      this.fetchCategory();
    }
  },
  methods: {
    async fetchData(id)
    {
      let res = await axios.get('/product/' + this.$route.params.id + '/edit')
    },
    async updateProduct(e)
    {
      let data = {
        name : this.formData.name,
        image : this.formData.image,
        description : this.formData.description,
        full_description : this.formData.full_description,
        price : this.formData.price,
        quantity : this.formData.quantity,
        categories: this.selectedCategories
      }
      console.log(data);
      let product = new FormData();
      product.append('name', data.name);
      product.append('image', data.image);
      product.append('categories', JSON.stringify(data.categories));
      product.append('description', data.description);
      product.append('full_description', data.full_description);
      product.append('price', data.price);
      product.append('quantity', data.quantity);

      let res = await axios.post('/product/' + this.editData.id , product, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
      })
        .then((res) => {
          this.formData.name = '';
          this.formData.image = '';
          this.formData.description = '';
          this.formData.full_description = '';
          this.formData.price = '';
          this.formData.quantity = '';
          this.formData.categories = '';
          this.list.push(res.data.formData)
        })
        .catch((err) => console.error(err));
    },
    async fetchCategory () {
      let res = await axios.get('/category')
      if (res.data) {
        this.categoryList = res.data.categories
      }
    },
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
  }
}
</script>
