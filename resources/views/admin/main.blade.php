@extends("layouts.admin")

@section("content")

<div class="content-wrapper"> 
    <div class="row">
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">{{ $stats["animes"] }}</h3>
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-success ">
                  <span class="mdi mdi-database icon-item"></span>
                </div>
              </div>
            </div>
            <h6 class="text-muted font-weight-normal">Кол-во аниме в базе данных</h6>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">{{ $stats["users"] }}</h3>
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-success">
                  <span class="mdi mdi-account icon-item"></span>
                </div>
              </div>
            </div>
            <h6 class="text-muted font-weight-normal">Кол-во пользователей</h6>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">$12.34</h3>
                  <p class="text-danger ms-2 mb-0 font-weight-medium">-2.4%</p>
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-danger">
                  <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                </div>
              </div>
            </div>
            <h6 class="text-muted font-weight-normal">Daily Income</h6>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">$31.53</h3>
                  <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p>
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-success ">
                  <span class="mdi mdi-arrow-top-right icon-item"></span>
                </div>
              </div>
            </div>
            <h6 class="text-muted font-weight-normal">Expense current</h6>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      {{--  --}}
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Добавить новое аниме</h4>
            <div class="row mt-4">
              <div class="col-12">

                <form action="/admin/add-anime" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label for="formGroupExampleInput">Название аниме</label>
                    <input type="text" class="form-control text-light @error('anime_name') is-invalid @enderror" id="formGroupExampleInput" name = "anime_name">
                  </div>
                  
                  @error('anime_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  
                  <div class="form-group">
                    <label for="">Изображение</label>
                    <input type="file" name="poster" class="form-control text-light @error('poster') is-invalid @enderror" id="formGroupExampleInput">
                  </div>
                  
                  @error('poster')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                  <div class="form-group">
                    <select class="form-select @error('anime_name') is-invalid @enderror" aria-label="Default select example" name="anime_category">
                      <option selected>Выберите жанр:</option>
                      <option value="novel">     Роман    </option>
                      <option value="detective"> Детектив </option>
                      <option value="horror">    Хоррор   </option>
                    </select>
                  </div>

                  @error('anime_category')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
      {{--  --}}
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Внести правки</h4>
            <div class="row mt-4">
              <div class="col-12">
                
                <form action="" method="POST">
                  <div class="form-group">
                    <label for="formGroupExampleInput">ID аниме</label>
                    <input type="text" class="form-control text-light" id="formGroupExampleInput" name = "name_of_anime">
                  </div>
                  <div class="form-group">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
      {{--  --}}
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-row justify-content-between">
              <h4 class="card-title mb-1">Загрузить файл</h4>
            </div>
            <div class="row mt-4">
              <div class="col-12">
                <form action="/admin/add-episode" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label for="exampleDataList" class="form-label">Название аниме</label>
                      <input name = "animeName"  class="form-control text-light @error('animeName') is-invalid @enderror" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                      <datalist id="datalistOptions">
                        @foreach ($animeList as $anime)
                          <option>{{ $anime->name }}</option>                          
                        @endforeach
                      </datalist>
                  </div>
                  
                  @error('animeName')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                  <div class="form-group">
                    <label for="formGroupExampleInput">Название эпизода</label>
                    <input type="text" class="form-control text-light @error('episodeName') is-invalid @enderror" id="formGroupExampleInput" name = "episodeName">
                  </div>
                  
                  @error('episodeName')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                  <div class="form-group">
                    <label for="formGroupExampleInput">Номер сезона</label>
                    <input type="number" class="form-control text-light @error('episodeNumber') is-invalid @enderror" id="formGroupExampleInput" name = "seasonNumber">
                  </div>

                  @error('seasonNumber')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                  <div class="form-group">
                    <label for="formGroupExampleInput">Номер серии</label>
                    <input type="number" class="form-control text-light @error('episodeNumber') is-invalid @enderror" id="formGroupExampleInput" name = "episodeNumber">
                  </div>

                  @error('episodeNumber')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                  <div class="form-group">
                    <label for="">Видео</label>
                    <input type="file" name="video" class="form-control text-light @error('video') is-invalid @enderror" id="formGroupExampleInput">
                  </div>
                  
                  @error('video')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5>Revenue</h5>
            <div class="row">
              <div class="col-8 col-sm-12 col-xl-8 my-auto">
                <div class="d-flex d-sm-block d-md-flex align-items-center">
                  <h2 class="mb-0">$32123</h2>
                  <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p>
                </div>
                <h6 class="text-muted font-weight-normal">11.38% Since last month</h6>
              </div>
              <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                <i class="icon-lg mdi mdi-codepen text-primary ms-auto"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5>Sales</h5>
            <div class="row">
              <div class="col-8 col-sm-12 col-xl-8 my-auto">
                <div class="d-flex d-sm-block d-md-flex align-items-center">
                  <h2 class="mb-0">$45850</h2>
                  <p class="text-success ms-2 mb-0 font-weight-medium">+8.3%</p>
                </div>
                <h6 class="text-muted font-weight-normal"> 9.61% Since last month</h6>
              </div>
              <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                <i class="icon-lg mdi mdi-wallet-travel text-danger ms-auto"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5>Purchase</h5>
            <div class="row">
              <div class="col-8 col-sm-12 col-xl-8 my-auto">
                <div class="d-flex d-sm-block d-md-flex align-items-center">
                  <h2 class="mb-0">$2039</h2>
                  <p class="text-danger ms-2 mb-0 font-weight-medium">-2.1% </p>
                </div>
                <h6 class="text-muted font-weight-normal">2.27% Since last month</h6>
              </div>
              <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                <i class="icon-lg mdi mdi-monitor text-success ms-auto"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row ">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Order Status</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>
                      <div class="form-check form-check-muted m-0">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input">
                        </label>
                      </div>
                    </th>
                    <th> Client Name </th>
                    <th> Order No </th>
                    <th> Product Cost </th>
                    <th> Project </th>
                    <th> Payment Mode </th>
                    <th> Start Date </th>
                    <th> Payment Status </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="form-check form-check-muted m-0">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input">
                        </label>
                      </div>
                    </td>
                    <td>
                      <img src="../images/faces/face1.jpg" alt="image" />
                      <span class="ps-2">Henry Klein</span>
                    </td>
                    <td> 02312 </td>
                    <td> $14,500 </td>
                    <td> Dashboard </td>
                    <td> Credit card </td>
                    <td> 04 Dec 2019 </td>
                    <td>
                      <div class="badge badge-outline-success">Approved</div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-check form-check-muted m-0">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input">
                        </label>
                      </div>
                    </td>
                    <td>
                      <img src="../images/faces/face2.jpg" alt="image" />
                      <span class="ps-2">Estella Bryan</span>
                    </td>
                    <td> 02312 </td>
                    <td> $14,500 </td>
                    <td> Website </td>
                    <td> Cash on delivered </td>
                    <td> 04 Dec 2019 </td>
                    <td>
                      <div class="badge badge-outline-warning">Pending</div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-check form-check-muted m-0">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input">
                        </label>
                      </div>
                    </td>
                    <td>
                      <img src="../images/faces/face5.jpg" alt="image" />
                      <span class="ps-2">Lucy Abbott</span>
                    </td>
                    <td> 02312 </td>
                    <td> $14,500 </td>
                    <td> App design </td>
                    <td> Credit card </td>
                    <td> 04 Dec 2019 </td>
                    <td>
                      <div class="badge badge-outline-danger">Rejected</div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-check form-check-muted m-0">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input">
                        </label>
                      </div>
                    </td>
                    <td>
                      <img src="../images/faces/face3.jpg" alt="image" />
                      <span class="ps-2">Peter Gill</span>
                    </td>
                    <td> 02312 </td>
                    <td> $14,500 </td>
                    <td> Development </td>
                    <td> Online Payment </td>
                    <td> 04 Dec 2019 </td>
                    <td>
                      <div class="badge badge-outline-success">Approved</div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-check form-check-muted m-0">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input">
                        </label>
                      </div>
                    </td>
                    <td>
                      <img src="../images/faces/face4.jpg" alt="image" />
                      <span class="ps-2">Sallie Reyes</span>
                    </td>
                    <td> 02312 </td>
                    <td> $14,500 </td>
                    <td> Website </td>
                    <td> Credit card </td>
                    <td> 04 Dec 2019 </td>
                    <td>
                      <div class="badge badge-outline-success">Approved</div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-xl-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-row justify-content-between">
              <h4 class="card-title">Messages</h4>
              <p class="text-muted mb-1 small">View all</p>
            </div>
            <div class="preview-list">
              <div class="preview-item border-bottom">
                <div class="preview-thumbnail">
                  <img src="../images/faces/face6.jpg" alt="image" class="rounded-circle" />
                </div>
                <div class="preview-item-content d-flex flex-grow">
                  <div class="flex-grow">
                    <div class="d-flex d-md-block d-xl-flex justify-content-between">
                      <h6 class="preview-subject">Leonard</h6>
                      <p class="text-muted text-small">5 minutes ago</p>
                    </div>
                    <p class="text-muted">Well, it seems to be working now.</p>
                  </div>
                </div>
              </div>
              <div class="preview-item border-bottom">
                <div class="preview-thumbnail">
                  <img src="../images/faces/face8.jpg" alt="image" class="rounded-circle" />
                </div>
                <div class="preview-item-content d-flex flex-grow">
                  <div class="flex-grow">
                    <div class="d-flex d-md-block d-xl-flex justify-content-between">
                      <h6 class="preview-subject">Luella Mills</h6>
                      <p class="text-muted text-small">10 Minutes Ago</p>
                    </div>
                    <p class="text-muted">Well, it seems to be working now.</p>
                  </div>
                </div>
              </div>
              <div class="preview-item border-bottom">
                <div class="preview-thumbnail">
                  <img src="../images/faces/face9.jpg" alt="image" class="rounded-circle" />
                </div>
                <div class="preview-item-content d-flex flex-grow">
                  <div class="flex-grow">
                    <div class="d-flex d-md-block d-xl-flex justify-content-between">
                      <h6 class="preview-subject">Ethel Kelly</h6>
                      <p class="text-muted text-small">2 Hours Ago</p>
                    </div>
                    <p class="text-muted">Please review the tickets</p>
                  </div>
                </div>
              </div>
              <div class="preview-item border-bottom">
                <div class="preview-thumbnail">
                  <img src="../images/faces/face11.jpg" alt="image" class="rounded-circle" />
                </div>
                <div class="preview-item-content d-flex flex-grow">
                  <div class="flex-grow">
                    <div class="d-flex d-md-block d-xl-flex justify-content-between">
                      <h6 class="preview-subject">Herman May</h6>
                      <p class="text-muted text-small">4 Hours Ago</p>
                    </div>
                    <p class="text-muted">Thanks a lot. It was easy to fix it .</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xl-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Portfolio Slide</h4>
            <div class="owl-carousel owl-theme full-width owl-carousel-dash portfolio-carousel" id="owl-carousel-basic">
              <div class="item">
                <img src="../images/dashboard/Rectangle.jpg" alt="">
              </div>
              <div class="item">
                <img src="../images/dashboard/Img_5.jpg" alt="">
              </div>
              <div class="item">
                <img src="../images/dashboard/img_6.jpg" alt="">
              </div>
            </div>
            <div class="d-flex py-4">
              <div class="preview-list w-100">
                <div class="preview-item p-0">
                  <div class="preview-thumbnail">
                    <img src="../images/faces/face12.jpg" class="rounded-circle" alt="">
                  </div>
                  <div class="preview-item-content d-flex flex-grow">
                    <div class="flex-grow">
                      <div class="d-flex d-md-block d-xl-flex justify-content-between">
                        <h6 class="preview-subject">CeeCee Bass</h6>
                        <p class="text-muted text-small">4 Hours Ago</p>
                      </div>
                      <p class="text-muted">Well, it seems to be working now.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <p class="text-muted">Well, it seems to be working now. </p>
            <div class="progress progress-md portfolio-progress">
              <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-xl-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">To do list</h4>
            <div class="add-items d-flex">
              <input type="text" class="form-control todo-list-input" placeholder="enter task..">
              <button class="add btn btn-primary todo-list-add-btn">Add</button>
            </div>
            <div class="list-wrapper">
              <ul class="d-flex flex-column-reverse text-white todo-list todo-list-custom">
                <li>
                  <div class="form-check form-check-primary">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox"> Create invoice </label>
                  </div>
                  <i class="remove mdi mdi-close-box"></i>
                </li>
                <li>
                  <div class="form-check form-check-primary">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox"> Meeting with Alita </label>
                  </div>
                  <i class="remove mdi mdi-close-box"></i>
                </li>
                <li class="completed">
                  <div class="form-check form-check-primary">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked> Prepare for presentation </label>
                  </div>
                  <i class="remove mdi mdi-close-box"></i>
                </li>
                <li>
                  <div class="form-check form-check-primary">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox"> Plan weekend outing </label>
                  </div>
                  <i class="remove mdi mdi-close-box"></i>
                </li>
                <li>
                  <div class="form-check form-check-primary">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox"> Pick up kids from school </label>
                  </div>
                  <i class="remove mdi mdi-close-box"></i>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection