<?php

namespace App\Controllers;

use App\Models\JobModel;
use App\Models\NewsModel;
use App\Models\historyModel;
use Myth\Auth\Models\UserModel;


class Pages extends BaseController
{
    protected $jobModel;
    protected $userModel;
    protected $newsModel;
    protected $historyModel;

    public function __construct()
    {
        $this->jobModel = new JobModel();
        $this->userModel = new UserModel();
        $this->newsModel = new NewsModel();
        $this->historyModel = new historyModel();
    }

    public function home()
    {
        $job = $this->jobModel->getJob();
        $data = [
            'title' => 'Home | WorkIt',
            'job' => $job,
            'jobCompany' => $this->jobModel->getCompanyJob()
        ];


        if ($this->request->getVar('start') == '2') {
            $this->jobModel->save([
                'jobId' => $this->request->getVar('jobId'),
                'status' => $this->request->getVar('start')
            ]);
            return redirect()->to('pages/home');
        }

        if ($this->request->getVar('end') == '3') {
            $this->jobModel->save([
                'jobId' => $this->request->getVar('jobId'),
                'status' => $this->request->getVar('end')
            ]);
            return redirect()->to('pages/home');
        }


        return view('pages/home', $data);
    }
    public function news()
    {
        if (user()->role == 'Job Provider') {
            return redirect()->to('/Pages/home');
        }
        $news = $this->newsModel->findAll();

        $data = [
            'title' => 'News | WorkIt',
            'news' => $news
        ];
        return view('pages/news', $data);
    }
    public function history()
    {
        if (user()->role == 'Job Provider') {
            return redirect()->to('/Pages/home');
        }
        $data = [
            'title' => 'History | WorkIt',
            'history' => $this->historyModel->getHistory()
        ];

        return view('pages/history', $data);
    }
    public function profiledetail()
    {
        // dd(user()->statusLogin);
        if (user()->statusLogin == "notfirstLogin") {
            return redirect()->to('pages/home');
        }

        $data = [
            'title' => 'Profile Detail | WorkIt',
            'validation' => \Config\Services::validation(),
            'user' => user()->id
        ];
        return view('pages/profiledetail', $data);
    }

    public function saveProfileDetail($id)
    {
        if (!$this->validate([
            'firstname' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Firstname must be filled!',
                    'alpha_space' => 'Firstname must be alphabet!'
                ]
            ],
            'lastname' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Lasttname must be filled!',
                    'alpha_space' => 'Lastname must be alphabet!'
                ]
            ],
            'dob' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Birth date must be filled!',
                ]
            ],
            'gender' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Gender must be chosen!',
                ]
            ],
            'phonenum' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Phone number must be filled!',
                    'integer' => 'Phone number must be a number!',
                ]
            ],
            'academicdegree' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Academic degree must be filled!',
                ]
            ],
            'country' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Country must be filled!',
                    'alpha_space' => 'Country must be alphabet!'
                ]
            ],
            'city' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'City must be filled!',
                    'alpha_space' => 'City must be alphabet!'
                ]
            ],
            'address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Address must be filled!',
                ]
            ],
        ])) {
            return redirect()->to('pages/profiledetail/' . user()->id)->withInput();
        }

        $this->userModel->save([
            'id' => $id,
            'firstname' => $this->request->getVar('firstname'),
            'lastname' => $this->request->getVar('lastname'),
            'dob' => $this->request->getVar('dob'),
            'gender' => $this->request->getVar('gender'),
            'phonenum' => $this->request->getVar('phonenum'),
            'academicdegree' => $this->request->getVar('academicdegree'),
            'country' => $this->request->getVar('country'),
            'city' => $this->request->getVar('city'),
            'address' => $this->request->getVar('address'),
            'statusLogin' => "notfirstLogin",
            'userImage' => "default.jpg",
        ]);

        session()->setFlashdata('message', 'Your profile has been submitted!');

        return redirect()->to('pages/home');
    }

    public function saveProfileDetailCompany($id)
    {
        if (!$this->validate([
            'companyName' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Company Name must be filled!',
                    'alpha_space' => 'Company Name must be alphabet!'
                ]
            ],
            'companyIndustry' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Industry must be filled!',
                    'alpha_space' => 'Industry must be alphabet!'
                ]
            ],
            'companyType' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Company Type must be chosen!',
                    'alpha_space' => 'Company Type must be alphabet!'
                ]
            ],
            'companyCountry' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Country must be filled!',
                    'alpha_space' => 'Country must be alphabet!'
                ]
            ],
            'companyCity' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'City must be filled!',
                    'alpha_space' => 'City must be alphabet!'
                ]
            ],
            'companyAddress' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Company Address must be filled!',
                ]
            ],
        ])) {
            return redirect()->to('pages/profiledetail/' . user()->id)->withInput();
        }

        $this->userModel->save([
            'id' => $id,
            'companyName' => $this->request->getVar('companyName'),
            'companyIndustry' => $this->request->getVar('companyIndustry'),
            'companyType' => $this->request->getVar('companyType'),
            'companyCountry' => $this->request->getVar('companyCountry'),
            'companyCity' => $this->request->getVar('companyCity'),
            'companyAddress' => $this->request->getVar('companyAddress'),
            'statusLogin' => "notfirstLogin",
            'userImage' => "default.jpg",
        ]);

        session()->setFlashdata('message', 'Your company profile has been submitted!');

        return redirect()->to('pages/home');
    }

    public function editprofile()
    {

        $data = [
            'title' => 'Edit Profile | WorkIt',
            'validation' => \Config\Services::validation(),
            'user' => user()->id
        ];
        return view('pages/editprofile', $data);
    }

    public function saveEditProfile($id)
    {

        if (!$this->validate([
            'firstname' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Firstname must be filled!',
                    'alpha_space' => 'Firstname must be alphabet!'
                ]
            ],
            'lastname' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Lasttname must be filled!',
                    'alpha_space' => 'Lastname must be alphabet!'
                ]
            ],
            'dob' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Birth date must be filled!',
                ]
            ],
            'gender' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Gender must be chosen!',
                ]
            ],
            'phonenum' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Phone number must be filled!',
                    'integer' => 'Phone number must be a number!',
                ]
            ],
            'academicdegree' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Academic degree must be filled!',
                ]
            ],
            'country' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Country must be filled!',
                    'alpha_space' => 'Country must be alphabet!'
                ]
            ],
            'city' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'City must be filled!',
                    'alpha_space' => 'City must be alphabet!'
                ]
            ],
            'address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Address must be filled!',
                ]
            ],
            'userImage' => [
                'rules' => 'is_image[userImage]|mime_in[userImage,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'is_image' => 'Your choice is not an image!',
                    'mime_in' => 'Your choice is not an image!'
                ]
            ],
        ])) {

            session()->setFlashdata('message', 'Your input is wrong! Please check again your input data');
            return redirect()->to('pages/editprofile/' . user()->id)->withInput();
        }

        // ambil gambar
        $fileUserImage = $this->request->getFile('userImage');

        // cek gambar, apakah tetap gambar lama
        if ($fileUserImage->getError() == 4) {
            $namaUserImage = $this->request->getVar('userImageOld');
        } else {
            // generate nama userImage random
            $namaUserImage = $fileUserImage->getRandomName();

            // memindahkan file ke folder img
            $fileUserImage->move('img', $namaUserImage);

            // hapus file lama
            if ($this->request->getVar('userImageOld') != "default.jpg") {
                unlink('img/' . $this->request->getVar('userImageOld'));
            }
        }

        $this->userModel->save([
            'id' => $id,
            'firstname' => $this->request->getVar('firstname'),
            'lastname' => $this->request->getVar('lastname'),
            'dob' => $this->request->getVar('dob'),
            'gender' => $this->request->getVar('gender'),
            'phonenum' => $this->request->getVar('phonenum'),
            'academicdegree' => $this->request->getVar('academicdegree'),
            'country' => $this->request->getVar('country'),
            'city' => $this->request->getVar('city'),
            'address' => $this->request->getVar('address'),
            'userImage' => $namaUserImage,
        ]);

        session()->setFlashdata('message', 'Your profile has been updated!');

        return redirect()->to('pages/home');
    }

    public function saveEditProfileCompany($id)
    {

        if (!$this->validate([
            'companyName' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Company Name must be filled!',
                    'alpha_space' => 'Company Name must be alphabet!'
                ]
            ],
            'companyIndustry' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Industry must be filled!',
                    'alpha_space' => 'Industry must be alphabet!'
                ]
            ],
            'companyType' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Company Type must be chosen!',
                    'alpha_space' => 'Company Type must be alphabet!'
                ]
            ],
            'companyCountry' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Country must be filled!',
                    'alpha_space' => 'Country must be alphabet!'
                ]
            ],
            'companyCity' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'City must be filled!',
                    'alpha_space' => 'City must be alphabet!'
                ]
            ],
            'companyAddress' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Company Address must be filled!',
                ]
            ],
            'userImage' => [
                'rules' => 'is_image[userImage]|mime_in[userImage,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'is_image' => 'Your choice is not an image!',
                    'mime_in' => 'Your choice is not an image!'
                ]
            ],
        ])) {

            session()->setFlashdata('message', 'Your input is wrong! Please check again your input data');

            return redirect()->to('pages/profiledetail/' . user()->id)->withInput();
        }

        // ambil gambar
        $fileUserImage = $this->request->getFile('userImage');

        // cek gambar, apakah tetap gambar lama
        if ($fileUserImage->getError() == 4) {
            $namaUserImage = $this->request->getVar('userImageOld');
        } else {
            // generate nama userImage random
            $namaUserImage = $fileUserImage->getRandomName();

            // memindahkan file ke folder img
            $fileUserImage->move('img', $namaUserImage);

            // hapus file lama
            if ($this->request->getVar('userImageOld') != "default.jpg") {
                unlink('img/' . $this->request->getVar('userImageOld'));
            }
        }

        $this->userModel->save([
            'id' => $id,
            'companyName' => $this->request->getVar('companyName'),
            'companyIndustry' => $this->request->getVar('companyIndustry'),
            'companyType' => $this->request->getVar('companyType'),
            'companyCountry' => $this->request->getVar('companyCountry'),
            'companyCity' => $this->request->getVar('companyCity'),
            'companyAddress' => $this->request->getVar('companyAddress'),
            'userImage' => $namaUserImage,
        ]);

        session()->setFlashdata('message', 'Your company profile has been updated!');

        return redirect()->to('pages/home');
    }

    public function insertjob()
    {

        $data = [
            'title' => 'Insert Job | WorkIt',
            'validation' => \Config\Services::validation(),
            'user' => user()->id
        ];
        return view('pages/insertjob', $data);
    }

    public function saveInsertJob($id)
    {
        if (!$this->validate([
            'jobName' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Job Name must be filled!',
                    'alpha_space' => 'Job Name must be alphabet!'
                ]
            ],
            'jobDescription' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Job Description must be filled!',
                ]
            ],
        ])) {
            session()->setFlashdata('message', 'Your input data is wrong! Please check again your input data');
            return redirect()->to('pages/insertjob/' . user()->id)->withInput();
        }

        $this->jobModel->save([
            'jobName' => $this->request->getVar('jobName'),
            'jobDescription' => $this->request->getVar('jobDescription'),
            'status' => 1,
            'userId' => $id
        ]);

        session()->setFlashdata('message', 'Job has successfuly added!');

        return redirect()->to('pages/home');
    }

    public function saveApply($jobId = 0)
    {
        // dd($jobId);
        $this->historyModel->save([
            'userId' => user()->id,
            'jobId' => $jobId,
        ]);


        return redirect()->to('pages/history');
    }


    public function jobdetail($id = 0)
    {
        if (user()->role == 'Job Seeker') {
            return redirect()->to('/Pages/home');
        }
        $job = $this->jobModel->getJobById($id);
        $userDetail = $this->jobModel->getJobDetail($id);
        // dd($userDetail);
        $data = [
            'title' => 'User Detail | WorkIt',
            'id' => $id,
            'job' => $job,
            'userDetail' => $userDetail,
        ];

        return view('pages/jobdetail', $data);
    }

    public function statusUser($historyId = 0)
    {
        // $statusUser = $this->historyModel->getStatusUser($historyId);
        $jobId = $this->request->getVar('id');
        // $jobId = $this->historyModel->getJobIdByHistoryId($historyId);
        // dd($jobId);
        // dd($statusUser);
        // dd($this->request->getVar('accept'));
        // dd($historyId);

        if ($this->request->getVar('accept') == "2") {
            $this->historyModel->save([
                'historyId' => $historyId,
                'userStatId' => "2"
            ]);
            return redirect()->to('pages/jobdetail/' . $jobId);
        }

        if ($this->request->getVar('reject') == "3") {
            $this->historyModel->save([
                'historyId' => $historyId,
                'userStatId' => "3"
            ]);
            return redirect()->to('pages/jobdetail/' . $jobId);
        }


        return redirect()->to('pages/jobdetail/' . $jobId);
    }

    public function editjob($id = 0)
    {
        if (user()->role == 'Job Seeker') {
            return redirect()->to('/Pages/home');
        }
        $editjob = $this->jobModel->getJobById($id);
        $data = [
            'title' => 'Update Job | WorkIt',
            'validation' => \Config\Services::validation(),
            'job' => $editjob
        ];
        return view('pages/editjob', $data);
    }

    public function saveEditJob($id)
    {
        if (!$this->validate([
            'jobName' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Job Name must be filled!',
                    'alpha_space' => 'Job Name must be alphabet!'
                ]
            ],
            'jobDescription' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Job Description must be filled!',
                ]
            ],
        ])) {
            session()->setFlashdata('message', 'Your input data is wrong! Please check again your input data');
            return redirect()->to('pages/editjob/' . $id)->withInput();
        }

        $this->jobModel->save([
            'jobId' => $id,
            'jobName' => $this->request->getVar('jobName'),
            'jobDescription' => $this->request->getVar('jobDescription'),
            'userId' => user()->id
        ]);

        session()->setFlashdata('message', 'Job has successfuly updated!');

        return redirect()->to('pages/home');
    }
}
