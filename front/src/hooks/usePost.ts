import { useRouter } from 'next/router';
import { useMutation } from 'react-query';
import { axiosApi } from '@/libs/axios';

export const usePost = ($endPoint: string) => {
  const router = useRouter();

  const { mutate } = useMutation({
    mutationFn: (data) =>
      axiosApi.get('/sanctum/csrf-cookie').then(() => {
        axiosApi.post($endPoint, data);
      }),
    onSuccess: () => {
      // 【TODO】動作確認のために一旦ルートに遷移させる。トップページができたらトップページへ
      router.push('/');
    },
  });
  return mutate;
};
