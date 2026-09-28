<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;

class TaskController extends BaseController
{
    protected $taskModel;
    protected $userModel;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
        $this->userModel = new UserModel();
    }

    // Welcome Page (/) - Displays only today's tasks
    public function welcome()
    {
        $data = [
            'page_title' => "Today's Tasks Dashboard",
            'tasks'      => $this->taskModel->getTodayTasks(),
            'today'      => date('F j, Y')
        ];
        return view('TS2/welcome_page', $data);
    }

    // Task List (/tasks) - Displays all tasks ordered by date
    public function index()
    {
        $data = [
            'page_title' => 'All Tasks',
            'tasks'      => $this->taskModel->getAllTasksOrdered()
        ];
        return view('TS2/tasks_index', $data);
    }

    // Profile Page (/profile) - Displays single demo user info
    public function profile()
    {
        $data = [
            'page_title' => 'User Profile',
            'user'       => $this->userModel->getDemoUser()
        ];
        return view('TS2/profile', $data);
    }

    // About Page (/about) - Static page identifying developer
    public function about()
    {
        $data = [
            'page_title' => 'About the Developer',
            'developer'  => [
                'name'    => 'Rainier Louis Espino',
                'section' => 'AC-31',
                'course'  => 'IT0049 - Web System Technologies'
            ]
        ];
        return view('TS2/about', $data);
    }
}