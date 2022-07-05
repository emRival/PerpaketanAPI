<div class="sidebar sidebar-style-2">
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<div class="user">
				<div class="avatar-sm float-left mr-2">
					@if(Auth::check())
					<img src="https://ui-avatars.com/api/?name={{Auth::user()->name}}" alt="..." class="avatar-img rounded-circle foto-profile">
					@endif
				</div>
				<div class="info">
					<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
						<span>
							{{ Auth::user()->name }}
							<span class="user-level">{{ Auth::user()->role }}</span>
							<span class="caret"></span>
						</span>
					</a>
					<div class="clearfix"></div>

					<div class="collapse in" id="collapseExample">
						<ul class="nav">
							<li>
								<a href="{{route('ganti')}}">
									<span class="link-collapse">Ganti Password</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<ul class="nav nav-primary">

				@if(Auth::user()->role == 'Admin')

				<li class="nav-item">
					<a href="{{route('jurusan.index')}}">
						<i class="fas fa-graduation-cap"></i>
						<p>Jurusan</p>

					</a>
				</li>
				<li class="nav-item">
					<a href="{{route('datasantri.index')}}">
						<i class="fas fa-users"></i>
						<p>Data santri</p>

					</a>
				</li>

				<li class="nav-item">
					<a data-toggle="collapse" href="#user">
						<i class="fas fa-box"></i>
						<p>Tracking Paket</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="user">
						<ul class="nav nav-collapse">
							<li>
								<a href="{{route('satpam.index')}}">
									<span class="sub-item">Pos Satpam</span>
								</a>
							</li>
							<li>
								<a href="{{route('musyrif.index')}}">
									<span class="sub-item">Ruang Musyrif</span>
								</a>
							</li>
							<li>
								<a href="{{route('selesai.index')}}">
									<span class="sub-item">Diambil</span>
								</a>
							</li>
						</ul>
					</div>
				</li>

				<li class="nav-item">
					<a href="{{route('manageuser')}}">
						<i class="fas fa-cogs"></i>
						<p>Manage User</p>

					</a>
				</li>
				@elseif(Auth::user()->role == 'Satpam')
				<li class="nav-item">
					<a data-toggle="collapse" href="#user">
						<i class="fas fa-box"></i>
						<p>Tracking Paket</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="user">
						<ul class="nav nav-collapse">
							<li>
								<a href="{{route('satpam.index')}}">
									<span class="sub-item">Pos Satpam</span>
								</a>
							</li>
							<li>
								<a href="{{route('musyrif.index')}}">
									<span class="sub-item">Ruang Musyrif</span>
								</a>
							</li>
							<li>
								<a href="{{route('selesai.index')}}">
									<span class="sub-item">Diambil</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				@else
			<li class="nav-item">
					<a data-toggle="collapse" href="#user">
						<i class="fas fa-box"></i>
						<p>Tracking Paket</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="user">
						<ul class="nav nav-collapse">
							<li>
								<a href="{{route('satpam.index')}}">
									<span class="sub-item">Pos Satpam</span>
								</a>
							</li>
							<li>
								<a href="{{route('musyrif.index')}}">
									<span class="sub-item">Ruang Musyrif</span>
								</a>
							</li>
							<li>
								<a href="{{route('selesai.index')}}">
									<span class="sub-item">Diambil</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				@endif
			</ul>
		</div>
	</div>
</div>