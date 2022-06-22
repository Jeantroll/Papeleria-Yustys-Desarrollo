<style>
    * {
  margin: 0;
  padding: 0;
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
}

body {
  background-color: #f3f3f2;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100vh;
}

.main-container {
  background-color: #fff;
  width: 700px;
  max-width: 100%;
  padding: 2rem;
  border-radius: 5px;
  box-shadow: 3px 5px 2px rgba(212, 208, 208, 0.2);
}
.profile-content {
  display: flex;
  width: 100%;
  margin: 10px 25px;
  justify-content: space-between;
  align-items: center;
}
.body-content {
  margin: 10px 25px;
}
.profile-img {
  display: flex;
  align-items: center;
}

button {
  width: 160px;
  height: 50px;
  transform: translate(-30%, -30%);
  background-color: black;
  color: #fff;
  border-radius: 5px;
  border: none;
}

.profile-img img {
  width: 70px;
  border: none;
  border-radius: 50%;
  height: 70px;
  margin-right: 10px;
}
span {
  color: gray;
  margin-right: 8px;
}
span:hover {
  color: blue;
  cursor: pointer;
}
.break {
  width: 85%;
  margin: 20px 7.4% 0;
  opacity: 0.5;
}

ul {
  display: flex;
  justify-content: start;
}
ul > li {
  list-style: none;
  margin: 10px;
  color: bisque;
}
li a {
  text-decoration: none;
  color: darkgray;
  font-size: 14px;
}

ul > li .active {
  color: black;
  font-size: 16px;
  font-weight: bold;
}
a:hover {
  color: blue;
  text-decoration: wavy;
  border-bottom: 1px turquoise solid;
}

/* card */
.main {
  display: grid;
  /* flex-direction: row; */
  grid-template-columns: repeat(3, 1fr);
  margin-top: 20px;
  gap: 20px;
  align-items: baseline;
  justify-content: space-between;
}
.card {
  background-color: #fff;
  border: 1px solid whitesmoke;
  padding: 2rem;
  border-radius: 10px;
  cursor: pointer;
}
.card:hover {
  background-color: black;
  color: #fff;
  border: none;
  box-shadow: 1px 2px 3px rgba(212, 208, 208, 0.2);
}
.card p {
  margin: 0;
}
.card .num {
  font-size: 1.5rem;
}
.main .bg-dark {
  background-color: black;
  color: #fff;
  border: none;
  box-shadow: 1px 2px 3px rgba(212, 208, 208, 0.2);
}
</style>

<div class="main-container">
    <div class="profile-content">
      <div class="profile-img">
        <img src="https://cactusthemes.com/blog/wp-content/uploads/2018/01/tt_avatar_small.jpg" />
        <div class="name">
          <h2>Hanibal Girmay</h2>
          <span>@hanibal_g</span><span>Designer</span>
        </div>
      </div>
      <button class="edit">
        <i class="fas fa-edit"></i>
        Edit
      </button>
    </div>
    <!-- break -->
    <hr class="break" />
    <div class="body-content">
      <ul>
        <li><a href="" class="active">Home</a></li>
        <li><a href="">Projects</a></li>
        <li><a href="">Jobs</a></li>
        <li><a href="">About</a></li>
        <li><a href="">Contact</a></li>
      </ul>

      <div class="main-title">
        <p>Insight</p>
        <p>May 28- Jun 24</p>
      </div>
      <div class="main">
        <div class="card bg-dark">
          <p>Project Reached</p>
          <p class="num">1212</p>
        </div>
        <div class="card">
          <p>Post Engagements</p>
          <p class="num">422</p>
        </div>
        <div class="card">
          <p>Page Likes</p>
          <p class="num">11</p>
        </div>
      </div>
    </div>
</div>