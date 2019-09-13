<template>
  <div>
    <div>
      <form @submit.prevent="createCategories">
        <div class="form-group row">
          <label for="inputCategory" class="col-sm-1 col-form-label title">Category</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" v-model="category.name">
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
      }
    };
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
      let data = {
        name: this.category.name
      }
      console.log(data);
      axios.post('/category',data)
        .then((res) => {
          this.category.name = '';
          this.list.push(res.data.category)
        })
        .catch((err) => console.error(err));
    },
    deleteCategory(id, index)
    {
      axios.delete('/category/' +id)
        .then((res) => {
          this.list.splice(index,1)
        })
        .catch((err) => console.error(err));
    }
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
