<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use Illuminate\Http\JsonResponse;
use App\Repository\ArticleRepository;

class APIController extends Controller
{
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function search(): JsonResponse
    {
        if (request()->get('query')) {
            $articles = $this->articleRepository->getArticlesFromSearch(request()->get('query'));
        }

        return response()->json($articles ?? []);
    }

    public function categoryNameUniqueCheck(): JsonResponse
    {
        $qb = Category::where('name', request()->get('name'));

        return response()->json($qb->doesntExist());
    }

    public function userEmailUniqueCheck(): JsonResponse
    {
        $qb = User::where('email', request()->get('email'));

        if (request()->has('user_id')) {
            $qb->where('id', '<>', request()->get('user_id'));
        }

        return response()->json($qb->doesntExist());
    }

    public function usersOnline(): JsonResponse
    {
        if (request()->headers->has('Initialization')) {
            $periods = new \DatePeriod(
                new \DateTime('-60 seconds'),
                new \DateInterval('PT5S'),
                new \DateTime('+5 seconds')
            );

            return response()->json([
                'data' => $this->getRandomUsersCountForPeriods($periods)
            ]);
        } else {
            return response()->json([
                'time' => (new \DateTime())->format('H:i:s'),
                'count' => $this->getRandomUsersCount()
            ]);
        }
    }

    private function getCurrentUsersCount(): int
    {
        if (!cache()->has('users_online')) {
            cache()->put('users_online', mt_rand(1, 2), 5);
        }

        return cache()->get('users_online');
    }

    private function getRandomUsersCountForPeriods(\DatePeriod $periods): array
    {
        $data = [];
        foreach ($periods as $key => $period) {
            $currentUsersCount = $this->getCurrentUsersCount();
            $randomCount = mt_rand(1, 2);

            if ($currentUsersCount - $randomCount < 0) {
                $currentUsersCount += $randomCount;
            } else {
                if (mt_rand(0, 1)) {
                    $currentUsersCount += $randomCount;
                } else {
                    $currentUsersCount -= $randomCount;
                }
            }

            $this->saveUsersCountToCache($currentUsersCount);

            $data[] = [
                'time' => $period->format('H:i:s'),
                'count' => $currentUsersCount
            ];
        }

        return $data;
    }

    private function getRandomUsersCount(): int
    {
        $currentUsersCount = $this->getCurrentUsersCount();
        $randomCount = mt_rand(1, 2);

        if ($currentUsersCount - $randomCount < 0) {
            $currentUsersCount += $randomCount;
        } else {
            if (mt_rand(0, 1)) {
                $currentUsersCount += $randomCount;
            } else {
                $currentUsersCount -= $randomCount;
            }
        }

        $this->saveUsersCountToCache($currentUsersCount);

        return $currentUsersCount;
    }

    private function saveUsersCountToCache(int $currentUsersCount): void
    {
        cache()->forget('users_online');
        cache()->put('users_online', $currentUsersCount, 5);
    }
}