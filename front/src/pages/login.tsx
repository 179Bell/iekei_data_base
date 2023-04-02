import { Header } from '@/components/organisms/Header';
import { Button, Container, FormControl, FormLabel, Input } from '@chakra-ui/react';
import axios from 'axios';
import { NextPage } from 'next';
import Head from 'next/head';
// import { useRouter } from 'next/router';
import { SubmitHandler, useForm } from 'react-hook-form';
import { useMutation } from 'react-query';

type FormValues = {
  email: string;
  password: string;
};

const Login: NextPage = () => {
  const { register, handleSubmit } = useForm<FormValues>();
  // const router = useRouter();

  axios.defaults.withCredentials = true;
  axios.defaults.baseURL = 'http://localhost:8080';

  const { mutate } = useMutation({
    mutationFn: (data) =>
      axios.get('/sanctum/csrf-cookie').then(() => {
        axios.post('api/login', data);
      }),
    onSuccess: () => {
      // ログイン先の画面が無いため一旦成功したらアラートを出す
      alert('ログインに成功しました。');
    },
  });

  const onSubmit: SubmitHandler<FormValues> = (data) => {
    mutate(data);
  };

  return (
    <>
      <Head>
        <title>ログインページ</title>
      </Head>
      <Header />
      <Container>
        <form onSubmit={handleSubmit(onSubmit)}>
          <FormControl isRequired>
            <FormLabel>メールアドレスを入力</FormLabel>
            <Input id="email" placeholder="メールアドレスを入力" {...register('email')}></Input>
          </FormControl>
          <FormControl isRequired>
            <FormLabel>パスワード</FormLabel>
            <Input id="password" placeholder="パスワードを入力" {...register('password')}></Input>
          </FormControl>
          <Button type="submit">ログイン</Button>
        </form>
      </Container>
    </>
  );
};

export default Login;
