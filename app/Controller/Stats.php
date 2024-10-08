<?php

namespace App\Controller;

use App\View;
use App\Response;
use App\Helper;
use App\DB;

class Stats extends Response
{

    public function index(): array
    {

        $this->status = 200;
        $this->content = View::make(
            'stats',
            [
                'title' => 'Analytics'
            ]
        );
        return $this->response();
    }

    public function linkStats(string $data = ''): array
    {
        $exist = (bool)DB::if_exist($data);

        if (!$exist) {
            return $this->index();
        }

        $stats = DB::fetch_link_stats($data);

        if (empty($stats)) {
            $view = 'link-no-stats';
        } else {
            $view = 'link-stats';
        }

        $this->status = 200;
        $this->content = View::make(
            $view,
            [
                'title' => 'Analytics',
                'stats' => $stats
            ]
        );
        return $this->response();
    }

    public function generate(): array
    {
        $link = Helper::sanitize($_POST['link']);

        if (!$link) {
            return $this->wrongLink();
        }

        $code = Helper::getCode();
        $if_exist = (bool)DB::if_exist($code);

        while ($if_exist) {
            $code = Helper::getCode();
            $if_exist = (bool)DB::if_exist($code);
        }

        DB::add_link($link, $code);

        $this->status = 200;
        $this->content = View::make(
            'generate',
            [
                'link' => $link,
                'code' => $code
            ],
            false
        );
        return $this->response();
    }

    public function wrongLink(): array
    {
        $this->status = 418;
        $this->content = View::make(
            'Error/WrongLink',
            [
                'title' => 'WrongLink'
            ]
        );

        return [418, '<input name="link" placeholder="Pleas fill valid link." class="form-control" type="url">'];
        return $this->response();
    }
}
