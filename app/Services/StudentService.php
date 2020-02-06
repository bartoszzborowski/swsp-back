<?php


namespace App\Services;

use App\Models\Student;
use App\Repository\StudentRepository;
use App\Repository\UserRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class StudentService
{
    /**
     * @var StudentRepository
     */
    private $studentRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(
        UserRepository $userRepository,
        StudentRepository $studentRepository
    ) {
        $this->studentRepository = $studentRepository;
        $this->userRepository = $userRepository;
    }

    public function getStudent(int $id): Student
    {
    }

    public function getStudentByUserId(int $userId): Student
    {
    }

    /**
     * @param int $id
     * @return bool|null
     * @throws Exception
     */
    public function removeStudent(int $id): ?bool
    {
        try {
            $student = $this->studentRepository->find($id);
            $this->studentRepository->delete($id);
            $this->userRepository->delete($student->getUserId());
            return true;
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            throw $exception;
        }
    }
}
