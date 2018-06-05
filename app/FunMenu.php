<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use DB;

class FunMenu extends Model
{
    protected $table = 'funmenu';

    public function leftmenu($user_id)
    {
        $sql = "
				SELECT
                    `icon` as `icon`,
					`MenuName` as `menuname`,
					GROUP_CONCAT(`FunName` ORDER BY `FunMenuDetailCOrder` SEPARATOR ',') AS `submenuname`,
					GROUP_CONCAT(`FunLink` ORDER BY `FunMenuDetailCOrder` SEPARATOR ',') AS `submenulink`
				FROM
					(
						SELECT
							*
						FROM
							`v_leftmenu`
						WHERE
							`FunId` IN (
								SELECT
									`Id`
								FROM
									`functions` AS `Functions_1`
								WHERE
									INSTR(
										CONCAT(
											',',
											(
												SELECT
													GROUP_CONCAT(`FunList` SEPARATOR '') AS `submenuname`
												FROM
													`funusergroups`
												WHERE
													    CONCAT(',', `UsrList`, ',') LIKE CONCAT('%,', '".$user_id."', ',%')
													AND `Valid` = 1
												GROUP BY
													`Valid`
											),
											','
										),
										CONCAT(
											',',
											`Id`,
											','
										)
									) > 0
							)
					) A
				GROUP BY
					`menuname`
				ORDER BY
					`FunMenuCorder`
				LIMIT
					0, 30
				;
			";

        $result = DB::select($sql);
        return $result;
    }
}
