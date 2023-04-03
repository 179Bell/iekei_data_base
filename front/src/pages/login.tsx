import { Header } from '@/components/organisms/Header';
import { Button, Container, FormControl, FormLabel, Input } from '@chakra-ui/react';
import { NextPage } from 'next';
import Head from 'next/head';
// import { useRouter } from 'next/router';
import { SubmitHandler, useForm } from 'react-hook-form';
import { usePost } from '@/hooks/usePost';

type FormValues = {
  email: string;
  password: string;
};

const Login: NextPage = () => {
  const endPoint = 'api/login';
  const { register, handleSubmit } = useForm<FormValues>();
  const mutate = usePost(endPoint);
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
