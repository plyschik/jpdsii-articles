<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Repository\ArticleRepository;
use Illuminate\Support\Facades\Cache;

class APIController extends Controller
{
    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function search(Request $request)
    {
        if ($request->get('query')) {
            $articles = $this->articleRepository->getArticlesFromSearch($request->get('search'));
        }

        return response()->json($articles ?? []);
    }

    public function categoryNameUniqueCheck(Request $request): JsonResponse
    {
        $qb = Category::where('name', $request->get('name'));

        return response()->json($qb->doesntExist());
    }

    public function userEmailUniqueCheck(Request $request): JsonResponse
    {
        $qb = User::where('email', $request->get('email'));

        if ($request->has('user_id')) {
            $qb->where('id', '<>', $request->get('user_id'));
        }

        return response()->json($qb->doesntExist());
    }

    public function usersOnline()
    {
        if (!Cache::has('users_online')) {
            Cache::put('users_online', mt_rand(1, 2), 5);
        }

        $current = Cache::get('users_online');

        if (request()->query->has('initialization')) {
            $periods = new \DatePeriod(
                new \DateTime('-60 seconds'),
                new \DateInterval('PT5S'),
                new \DateTime('+5 seconds')
            );

            $data = [];
            foreach ($periods as $key => $value) {
                $rand = mt_rand(1, 2);

                if ($current - $rand < 0) {
                    $current += $rand;
                } else {
                    if (mt_rand(0, 1)) {
                        $current += $rand;
                    } else {
                        $current -= $rand;
                    }
                }

                $data[] = [
                    'time' => $value->format('H:i:s'),
                    'count' => $current
                ];
            }

            Cache::forget('users_online');
            Cache::put('users_online', $current, 5);

            return response()->json([
                'data' => $data
            ]);
        }

        $rand = mt_rand(1, 2);

        if ($current - $rand < 0) {
            $current += $rand;

            Cache::increment('users_online', $rand);
        } else {
            if (mt_rand(0, 1)) {
                $current += $rand;

                Cache::increment('users_online', $rand);
            } else {
                $current -= $rand;

                Cache::decrement('users_online', $rand);
            }
        }

        return response()->json([
            'time' => date('H:i:s', time()),
            'count' => $current
        ]);
    }
}