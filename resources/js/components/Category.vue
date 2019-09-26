<template>
  <div>
    <div>
      <form @submit.prevent="createCategories">
        <div class="form-group row">
          <label for="name" class="col-sm-1 col-form-label title">Category</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" v-model="category.name" id="name" name="name" :class="{ 'is-invalid': submitted && $v.category.name.$error }">
            <div v-if="submitted && !$v.category.name.required" class="invalid-feedback">Category is required</div>
           </div>
        </div>
        <div>
          <button type="submit" class="btn btn-primary add-category">Add category</button>
        </div>
      </form>
    </div>
    <div>
      <ul>
        <p v-if="list.length === 0">There is no categories yet!</p>
        <li class="list-group-item col-sm-8" v-for="(category, index) in list" :key="index">
          {{ category.name }}
          <div style="text-align: right">
            <button data-inline="true" @click="deleteCategory(category.id,index)" class="btn btn-danger">Delete</button>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>
<script>
import { required } from "vuelidate/lib/validators";
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
      category: {
        name: ''
      },
      submitted: false
    };
  },
  validations: {
    category: {
      name: {
        required
      },
    }
  },
  mounted() {
    console.log('mounted');
    if(this.postData)
    {
      this.list = this.postData
    }
  },
  methods: {
    async createCategories()
    {
      this.submitted = true;
      this.$v.category.$touch()
      if (this.$v.$invalid) {
        return false
      }
      let data = {
        name: this.category.name
      }
      console.log(data);
      let res = await axios.post('/category',data)
        this.category.name = '';
        this.list.push(res.data.category)
        this.$v.category.$reset()
        if(res.data.success) {
          this.$toaster.success('Product is added successfully')
          return true
        }
        this.$toaster.error('error');
        return false
    },
    deleteCategory(id, index)
    {
      axios.delete('/category/' +id)
        .then((res) => {
          this.list.splice(index,1)
        })
        .catch((err) => console.error(err));
    },
  }
};
</script>
<style>
  .add-category {
    margin-left: 300px;
  }
  .delete {
    color: red;
  }
</style>
