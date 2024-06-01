<?php

namespace Admin\Http\Controllers;
use Admin\Models\Award;
use Admin\Models\Blog;
use Admin\Models\Message;
use Admin\Models\Photo;
use Admin\Models\PhotoCategory;
use Admin\Models\Project;
use Admin\Models\ProjectCategory;
use Admin\Models\Video;
use User\Models\{
    User,
};


class DashboardController extends JsonResponse
{
    public function __invoke()
    {
        $project_categories = ProjectCategory::count();
        $projects           = Project::count();
        $videos             = Video::count();
        $photo_categories   = PhotoCategory::count();
        $photos             = Photo::count();
        $awards             = Award::count();
        $blogs              = Blog::count();
        $messages           = Message::count();

        $statistics = array(
            'project_categories'    => $project_categories,
            'projects'              => $projects,
            'videos'                => $videos,
            'photo_categories'      => $photo_categories,
            'photos'                => $photos,
            'awards'                => $awards,
            'blogs'                 => $blogs,
            'messages'              => $messages,
        );
        return view('Admin::home',compact('statistics'));
    }
}
