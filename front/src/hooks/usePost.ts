import axios from 'axios';
import { useRouter } from 'next/router';
import { useMutation } from 'react-query';

export const usePost = ($endPoint: string) => {
  const router = useRouter();

  axios.defaults.withCredentials = true;
  axios.defaults.baseURL = 'http://localhost:8080';

  const { mutate } = useMutation({
    mutationFn: (data) =>
      axios.get('/sanctum/csrf-cookie').then(() => {
        axios.post($endPoint, data);
      }),
    onSuccess: () => {
      // 【TODO】動作確認のために一旦ルートに遷移させる。トップページができたらトップページへ
      router.push('/');
    },
  });
  return mutate;
};
