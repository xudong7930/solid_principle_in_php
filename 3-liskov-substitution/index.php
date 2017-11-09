<?
/**
1. Signature must match;
2. Preconditions can not be greater
3. Post conditions at least equal to 
4. Exception types must match.
 */

interface LessonInterface {
    public function getAll();
}

class FileLessonRepository implements LessonInterface {
    public function getAll()
    {
        return [];
    }
}

class DbLessonRepository implements LessonInterface {
    public function getAll()
    {
        return App\Lesson::all()->toArray();        
    }
}


function foobar(LessonInterface $lesson)
{
    $lesson->getAll();

    // 确保子类的实现方法返回的数据类型一致
    if ($lesson instanceOf DbLessonRepository) {
        // do....
    }
}
