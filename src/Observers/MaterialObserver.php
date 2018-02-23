<?php
namespace Modules\Weasy\Observers;

use Modules\Weasy\Models\Material;
use Modules\Weasy\Services\Material as MaterialService;

class MaterialObserver
{
    /**
     * 素材服务
     *
     * @var Modules\Weasy\Services\Material
     */
    private $materialService;

    public function __construct(MaterialService $materialService)
    {
        $this->materialService = $materialService;
    }

    public function saving(Material $material)
    {
        if (!$material->media_id) {
            $material->media_id = $this->materialService->buildMaterialMediaId();
        }
    }

    public function created(Material $material)
    {
        //artile类型不可放到监听中
        if ($material->type != 'article' && !$material->original_id && $material->parent_id) {
            $material->original_id = $this->materialService->postToRemote($material);
        }
    }
}
